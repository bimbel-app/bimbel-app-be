<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Carbon;
class UserController extends Controller
{
    public function register (Request $request){
        $valid = Validator::make($request->all(), [
        'name' => 'required',
        'username'=>'required',
        'email' => 'required|email|unique:users',
        'phoneNumber'=>'required',
        'password' => 'required|min:8|confirmed',
        ]);
        
        if($valid->fails()){
            return response ()->json($valid->errors(), 422);
        }

        // dd($request->username);
        $user = User::create([
            'name'=> $request->name,
            'username'=>$request->username,
            'email'=> $request->email,
            'phone_number'=>$request->phoneNumber,
            'password'=> bcrypt($request->password),
            'email_verified_at' => Carbon::now(),
        ]);

        if($user){
            return response()->json([
                'success'=> true,
                $user
            ], 201);
        }

        return response()->json([
            'success'=> false,
        ], 409);
    }
    
    public function login (Request $request){
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        if(!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah'
            ], 401);
            
        }

        return response()->json([
            'success' => true,
            'user'    => auth()->user(),    
            'token'   => $token   
        ], 200);    
    }
}
