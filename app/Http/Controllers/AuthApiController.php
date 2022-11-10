<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request){
        $request->validate([
            "name" => "required|min:3",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|confirmed"
        ]);

        User::create([
            "name" => $request->name,
            "email"  => $request->email,
            "password" => Hash::make($request->password)
        ]);

//        We Can Read About Auth::attempt (https://laravel.com/docs/9.x/authentication)
        if(Auth::attempt($request->only(["email","password"]))){
            $token = Auth::user()->createToken($request->email)->plainTextToken;
            return response()->json(["token" => $token, "status"=>"success"]);
        }

        return response()->json(["message"=>"User Not Found"],404);
    }

    public function login(Request $request){

        $request->validate([
            "email" =>  "required| exists:users,email|email",
            "password" => "required|min:8",
        ]);
        if(Auth::attempt($request->only(["email","password"]))){
            $token = Auth::user()->createToken($request->email)->plainTextToken;
            return response()->json(["message"=>"success", "token"=>$token]);
        }
        return response()->json(["message"=>"User Not Found !"],401);
    }

    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return response()->json(["message" => "Logout Successfully"],204);
    }

    public function logoutAll(){
        Auth::user()->tokens()->delete();
        return response()->json(["message"=>"logout All Successfully"], 204);
    }

    public function logoutAllWithoutCurrentAccess(){

        Auth::user()->tokens->map(function($tokens){
            $currentToken = Auth::user()->currentAccessToken();
            if($tokens->tokenable_id != $currentToken->tokenable_id){
                Auth::user()->tokens()->delete();
            }
        });
        /*return response()->json(["message"=>"logoutAllWithoutCurrentAccess successfully"]);*/
        return response()->json(['message'=> 'logout all of devices'], 201);
    }

    public function tokens(){
        $tokens = Auth::user()->tokens;
        return response()->json($tokens);
    }
}
