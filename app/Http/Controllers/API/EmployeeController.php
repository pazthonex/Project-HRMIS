<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\EncryptDecrypt;
use App\Models\Department;

class EmployeeController extends Controller
{
   
    public function index(){
      $employees = Employee::all();
      return response()->json(
        ['status'=>200,
        'data'=>$employees]);
    }
    
    public function edit(Request $request){
        $employees = Employee::find($request->id);
        $department = Department::all();
       if($employees){

          return response()->json(
            ['status'=>200,
            'employees'=>$employees,
            'department'=>$department,
          ]);

        }
        return response()->json(
          ['status'=>404,
          'msg'=> 'Not Found',
        ]);
   }
   public function store(Request $request){

    $aes = new EncryptDecrypt();

    $validator = Validator::make($request->all(),[
      'firstname' => 'required',
      'lastname' => 'required',
      'emailaddress' => 'required|email|unique:employee,EmailAddress',
  ]
  );

  if($validator->fails()){
      return response()->json([
          'status' => 400,
          'errors' => $validator->messages(),
      ]);
  }


   
           $employee = new Employee();
            $employee->FirstName = $request->firstname;
            $employee->MiddleName = $request->middlename;
            $employee->LastName = $request->lastname;
            $employee->Ext  = $request->ext;
            $employee->Prefix  = $request->prefix;
            $employee->Suffix  = $request->suffix;
            $employee->Sex  = (empty($request->sex)?"":$aes->encrypt($request->sex));
            $employee->CivilStatus  = (empty($request->civilstatus)?"":$aes->encrypt($request->civilstatus));
            $employee->CitizenShip  = (empty($request->citizenship)?"":$aes->encrypt($request->citizenship));
            $employee->AgencyNumber = $request->agencynumber;
            $employee->EmploymentStatus  = $request->employmentstatus;
            $employee->Department  = $request->department;
            $employee->EmailAddress  = $request->emailaddress;
            $employee->Telephone  = $request->telephone;
            $employee->Cellphone  = $request->cellphone;
            $employee->DateOfBirth = (empty($request->dateofbirth)?"":$aes->encrypt($request->dateofbirth));
            $employee->PlaceOfBirth = (empty($request->placeofbirth)?"":$aes->encrypt($request->placeofbirth));
            $employee->save();
            return response()->json(
              ['status'=>200,
              'msg'=>'Employee Added!']);
   }

   public function update(Request $request){
    // dd($request->all());
    $aes = new EncryptDecrypt();
    $employee = Employee::find($request->id);
    if($employee){
      
      if($request->updatetype == 'personalprofile'){
        $validator = Validator::make($request->all(),[
          'firstname' => 'required',
          'lastname' => 'required',
          'emailaddress' => 'required|email|unique:employee,EmailAddress,'.$request->id,
         ]);
      
         if($validator->fails()){
          return response()->json([
              'status' => 400,
              'errors' => $validator->messages(),
          ]);
      }
        $employee->FirstName = $request->firstname;
        $employee->MiddleName = $request->middlename;
        $employee->LastName = $request->lastname;
        $employee->Ext = $request->ext;
        $employee->Prefix = $request->prefix;
        $employee->Suffix = $request->suffix;
        $employee->Sex = (empty($request->sex)?"":$aes->encrypt($request->sex));
        $employee->AgencyNumber = $request->agencynumber;
        $employee->PlaceOfBirth = (empty($request->placeofbirth)?"":$aes->encrypt($request->placeofbirth));
        $employee->CivilStatus = (empty($request->civilstatus)?"":$aes->encrypt($request->civilstatus));
        $employee->Citizenship = (empty($request->citizenship)?"":$aes->encrypt($request->citizenship));
        $employee->EmailAddress = $request->emailaddress;
        $employee->Telephone = $request->telephone;
        $employee->Cellphone = $request->cellphone;
        $employee->DateOfBirth = (empty($request->dateofbirth)?"":$aes->encrypt($request->dateofbirth));
        $employee->Department = $request->department;
        $employee->EmploymentStatus = $request->employmentstatus;
      }
      if($request->updatetype == 'address'){
        $employee->PHouseNo = (empty($request->phouseno)?"":$aes->encrypt($request->phouseno));
        $employee->PHouseStreet = (empty($request->phousestreet)?"":$aes->encrypt($request->phousestreet));
        $employee->PSubDivision = $aes->encrypt($request->psubdivision);
        $employee->PBarangay = $aes->encrypt($request->pbarangay);
        $employee->PZip = $aes->encrypt($request->pzip);
        $employee->RTelephone = $aes->encrypt($request->ptelephone);
        $employee->RHouseNo = $aes->encrypt($request->rhouseno);
        $employee->RHouseStreet = $aes->encrypt($request->rhousestreet);
        $employee->RSubDivision = $aes->encrypt($request->rsubdivision);
        $employee->RBarangay = $aes->encrypt($request->rbarangay);
        $employee->RZip = $aes->encrypt($request->rzip);
        $employee->RTelephone = $aes->encrypt($request->rtelephone);
     }
     if($request->updatetype == 'cardnumber'){
      $employee->TIN = $request->tin;
      $employee->GSISID = $request->gsisid;
      $employee->PagIbigID = $request->pagibigid;
      $employee->PhilHealth = $request->philhealth;
      $employee->SSS = $request->sss;
      $employee->Height = $request->height;
      $employee->Weight = $request->weight;
      $employee->BloodType = $request->bloodtype;
     }
     if($request->updatetype == 'other'){
      
      $employee->LoginComputation = $request->logincomputation;
      $employee->isactive = $request->isActive;
      $employee->CurrentItem = $request->currentitem;
     }
     $employee->update();
     return response()->json(['status'=>200,'msg'=>'Employee Updated!']);
    }           
    return response()->json(['status'=>404,'msg'=>'Employee Not Found!']);
   
   }


   public function destroy(Request $request){

    $employee = Employee::find($request->id);
        if($employee){
            $employee->delete();
            return response()->json(['status'=>200,'msg'=>'Employee Deleted!']);
        }
        return response()->json([
          'status' => 404,
          'errors' => [
             'message' => 'Cant Find Employee!']
      ]);
   }




}
