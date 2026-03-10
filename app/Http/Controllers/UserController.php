<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\UseResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $validated= $request->validate([
            "name"=>"required|string|min:3|max:25",
            "email"=>"required|string|unique:users,email",
            "password"=>"required|string|min:6|confirmed"
        ]);
       $user = User::create([
            "name"=>$validated["name"],
            "email"=>$validated["email"],
            "password"=>Hash::make($validated["password"]),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
           "success"=>true,
           "user"=> new UseResource($user),
           "token"=>$token,
        ]);
    }

public function login(Request $request){
   $validated = $request->validate([
    "email"=>"required|string",
    "password"=>"required|string|min:5",
   ]);
   $user = User::where('email',$validated['email']);
   if(!$user || Hash::check($validated['password'])){
    return response()->json([
        "success"=>false,
        "user"=>new UserResource($user),
        "message"=>"email po password incorrect"
    ]);
   }
   $token = $user->createToken('auth_token',['read','update'])->planeTextToken;
   return response()->json([
    "success"=>true,
    "user"=>new UserResource($user),
    "token"=>$token
   ]);
}
   public function logout(Request $request){
    if($request->user() && $request->user()->currentAccessToken()){
     $request->user()->tokens()->delete();
     return response()->json([
         "message"=>"you are logged out",
     ]);
    }
    return response()->json([
            "message"=>"user has already been logged out",
        ]);
   }
}
