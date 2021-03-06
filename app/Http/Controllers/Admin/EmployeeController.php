<?php

namespace App\Http\Controllers\Admin;

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
            $department = Department::all();
            $aes = new EncryptDecrypt();
          //  dd($employees);
           return view('pages.admin.employee', compact('employees', 'department'));
    }
    public function getallstudents(){
      $employees = Employee::all();
      return response()->json(
        ['status'=>200,
        'data'=>$employees]);
    }
    
    public function edit($id){

     //dd($id);
     $id = base64_decode($id);
        $employee = Employee::find($id);
        $department = Department::all();
      //  $aes = new EncryptDecrypt();
      //dd($employee);
       if($employee){
            return view('pages.admin.employee.edit', compact('employee','department'));
        }
     /// return redirect('/employee');
   }
   public function store(Request $request){

    $aes = new EncryptDecrypt();
    $validator = Validator::make($request->all(),[
    'firstname' => 'required',
    'lastname' => 'required',
    'emailaddress' => 'required|email|unique:employee,EmailAddress',
   ]);

    if(!$validator->passes()){
        return response()->json(['status'=>401,'error'=>$validator->errors()->toArray()]);
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
      
          if(!$validator->passes()){
              return response()->json(['status'=>401,'error'=>$validator->errors()->toArray()]);
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
    return view('pages.admin.employee');
   
   }


   public function destroy(Request $request){

    $employee = Employee::find($request->id);
        if($employee){
            $employee->delete();
            return response()->json(['status'=>200,'msg'=>'Employee Deleted!']);
        }
        return view('pages.admin.employee');
   }




}
