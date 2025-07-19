<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $validate=$request->validate([
            'email'=>['required', 'email', 'string', 'exists:users'],
            'password'=>['required', 'string']
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'success'=>0,
                'message'=>'invalid credentials'
            ]);
        }
        $token = $user->createToken($user->email);

        return response()->json([
            'success'=>1,
            'user'=>$user,
            'token'=>$token->plainTextToken,
            'status'=>201
        ]);
    }
    public function register(Request $request){
        $validate=$request->validate([
            'name'=>['required', 'string', 'min:3', 'max:255', 'unique:users'],
            'email'=>['required', 'string', 'email', 'unique:users'],
            'password'=>['required', 'string', 'max:255']
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $token = $user->createToken($request->email);

        return response()->json([
            'success'=>1,
            'user'=>$user,
            'token'=>$token->plainTextToken,
            'status'=>201
        ]);
    }
    public function logout(Request $request){
        
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success'=>1,
        ]);
    }
}
