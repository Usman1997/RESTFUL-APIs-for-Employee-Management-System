<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Tymon\JWTAuth\Facades\JWTAuth;
class UserController extends Controller
{
    public function Signup(Request $request){
        $this->validate($request,[
           'name' => 'required',
            'email' =>'required |email|unique:users',
            'password' => 'required'

        ]);
        $user = new User([
            'name' => $request->input('name'),
            'email'=>$request->input('email'),
            'password' =>bcrypt($request->input('password'))

        ]);
        $user->save();
        return response()->json(['message'=>'User Registerd Successfully',201]);
    }

    public function SignIn(Request $request){
        $this->validate($request,[
            'name' => 'required',
             'email' =>'required |email',
             'password' => 'required'
 
         ]);
         $credentials = $request->only('email','password');
         try{
             if(!$token = JWTAuth::attempt($credentials)){
                 return response()->json(['message'=>'Invalid Credentials'],401);
             }
         }catch(JWTException $e){
             return response()->json(['error'=>'Could not create token!'],500);
         }
         return response()->json(['token'=>$token],200);

    }
}
