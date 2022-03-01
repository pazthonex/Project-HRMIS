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
           return view('pages.employee', compact('employees', 'department'), [
             'aes' => $aes
           ]);
    }
    public function edit(Request $request){
        $employee = Employee::find($request->id);
       if($employee){
            return view('pages.employee.edit', compact('employee'));
        }
      return redirect('/employee');
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
            $employee->Sex  = $aes->encrypt($request->sex);
            $employee->CivilStatus  = $aes->encrypt($request->civilstatus);
            $employee->CurrentItem = $request->currentitem;
            $employee->EmploymentStatus  = $request->employmentstatus;
            $employee->Department  = $request->department;
            $employee->EmailAddress  = $request->emailaddress;
            $employee->Telephone  = $request->telephone;
            $employee->Cellphone  = $request->cellphone;
            $employee->DateOfBirth = $aes->encrypt($request->dateofbirth);
            $employee->PlaceOfBirth = $aes->encrypt($request->placeofbirth);
            $employee->save();
            return response()->json(
              ['status'=>200,
              'msg'=>'Employee Added!']);
   }

   public function update(Request $request){
   //  dd($request->all());
    $aes = new EncryptDecrypt();
    $validator = Validator::make($request->all(),[
      'firstname' => 'required',
      'lastname' => 'required',
      'emailaddress' => 'required|email|unique:employee,EmailAddress,'.$request->id,
     ]);
  
      if(!$validator->passes()){
          return response()->json(['status'=>401,'error'=>$validator->errors()->toArray()]);
      }


    $employee = Employee::find($request->id);
 
    //dd($request->all());
    if($employee){
        $employee->FirstName = $request->firstname;
        $employee->MiddleName = $request->lastname;
        $employee->LastName = $request->lastname;
        $employee->DateOfBirth = $request->dateofbirth;
        $employee->PlaceOfBirth = $request->placeofbirth;
        $employee->Sex = $request->sex;
        $employee->CivilStatus = $request->civilstatus;
        $employee->Citizenship = $request->citizenship;
        $employee->TIN = $request->tin;
        $employee->GSISID = $request->gsisid;
        $employee->PagIbigID = $request->pagibigid;
        $employee->PhilHealth = $request->philhealth;
        $employee->SSS = $request->sss;
        $employee->Telephone = $request->telephone;
        $employee->Cellphone = $request->cellphone;
        $employee->EmailAddress = $request->emailaddress;
        $employee->AgencyNumber = $request->agencynumber;
        $employee->EmploymentStatus = $request->employmentstatus;
        $employee->CurrentItem = $request->currentitem;
        $employee->Department = $request->department;
        $employee->Ext = $request->ext;
        $employee->Height = $request->height;
        $employee->Weight = $request->weight;
        $employee->BloodType = $request->bloodtype;
        $employee->RTelephone = $request->rtelephone;
        $employee->RHouseNo = $request->rhouseno;
        $employee->RHouseStreet = $request->rhousestreet;
        $employee->RSubDivision = $request->rsubdivision;
        $employee->PHouseNo = $request->phouseno;
        $employee->PHouseStreet = $request->phousestreet;
        $employee->PSubDivision = $request->psubdivision;
        $employee->RBarangay = $request->rbarangay;
        $employee->PBarangay = $request->pbarangay;
        $employee->RZip = $request->rzip;
        $employee->PZip = $request->pzip;
        $employee->Prefix = $request->prefix;
        $employee->Suffix = $request->suffix;
        $employee->LoginComputation = $request->logincomputation;
        $employee->update();
    }           

    return response()->json(['status'=>200,'msg'=>'Employee Updated!']);
   }




}
