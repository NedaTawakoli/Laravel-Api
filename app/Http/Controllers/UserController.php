<?php

namespace App\Http\Controllers;

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

public function login(){

}
}
