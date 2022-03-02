<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_route(){
        return view('pages.admin.auth.login');
    }
    public function reg_route(){
        return view('pages.admin.auth.register');
    }
    public function login_route_hr(){
        return view('pages.hr.auth.login');
    }
    public function reg_route_hr(){
        return view('pages.hr.auth.register');
    }
    
    public function login(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
           ]);
        
            if(!$validator->passes()){
                return response()->json(['status'=>401,'error'=>$validator->errors()->toArray()]);
            }
            $user = User::where('username', $request->username)->where('role' , $request->role)->first();
            if (! $user || ! Hash::check($request->password, $user->password)) {

                return response()->json([
                    'status' => 401,
                    'msg' =>'The provided credentials are Incorrect.'
                    
                ]);
            }
           
                if($user->role == 1){  // 1 = Admin
                    $token = $user->createToken($user->username.'_admintoken', ['admin'])->plainTextToken;
                }else if($user->role == 2){ // 2 = Hr
                    $token = $user->createToken($user->username.'_hrtoken', ['hr'])->plainTextToken;
                }
                $data = [
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'role' => $user->role,
                    'token' => $token,
                    'msg' => 'Logged In Successfully',
                ];

                return response()->json([
                    'status' => 200,
                    'data' => $data
                ]);
    }
    public function register(Request $request){

     // dd($request->all());
        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
           // 'confirmpassword' => 'required_with:password|same:password|min:4'
        ]
        );

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'error' => $validator->messages(),
            ]);
        }else{

            $user = User::create([
                'firstname'=> $request->firstname,
                'lastname'=> $request->lastname,
                'email'=> $request->email,
                'username'=> $request->username,
                'password' =>Hash::make($request->password),
                'role' =>  $request->role,
            ]);

            $token = $user->createToken($user->email.'_Token')->plainTextToken;

            // $data = [
            //         'firstname' => $request->firstname,
            //         'lastname' => $request->lastname,
            //          'token' => $token,
            //         'msg' => 'Account Registered Successfully'
            // ];

            return response()->json([
                'status' => 200,
                'msg' => 'Account Registered Successfully'
               // 'data' => $data,

            ]);
        }

    }
    public function register_tick_function(Request $request){
        dd($request->all());
    }
}
