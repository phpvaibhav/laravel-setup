<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class AuthController extends Controller
{
    public function postRegister(Request $request){
    	request()->validate([
        'fullName' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);
        
        $data = $request->all();
       
        $check = $this->create($data);
        if($check){
        	return ['status'=>'success','message'=>'Registration successfuly.'];
        }else{
        	return ['status'=>'fail','message'=>'Something going wrong.'];
        }
    }//end function
      public function create(array $data)
    {
      return User::create([
        'name'          => $data['fullName'],
        'email'         => $data['email'],
        'password'      => Hash::make($data['password']),
        'api_token'     => Str::random(60),
      ]);
    }//End FUnction
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return ['status'=>'success','message'=>'Login successfully.'];
        }
        return ['status'=>'fail','message'=>'Oppes! You have entered invalid credentials'];
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/')->withSuccess('Login successfuly done.');;
    }
   
}
