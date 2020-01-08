<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class UserController extends Controller 
{
	public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request){ 
    	 $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);
		if ($validator->fails()) { 
			return response()->json(['status'=>'fail','message'=>$validator->errors()], 200);            
		}
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
		if ($validator->fails()) { 
			return response()->json(['status'=>'fail','message'=>$validator->errors()], 200);            
		}
		$input 				= $request->all(); 
        $input['password'] 	= bcrypt($input['password']); 
        $user 				= User::create($input); 
        $success['token'] 	=  $user->createToken('MyApp')->accessToken; 
        $success['name'] 	=  $user->name;
		return response()->json(['success'=>$success], $this->successStatus); 
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details(Request $request) 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 
    public function test(Request $request) 
    { 
      
        return response()->json(['success' =>"test successfully"], $this->successStatus); 
    } 
}