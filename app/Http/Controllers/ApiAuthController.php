<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{

    public function register(Request $req){

        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:28',
            'avatar' => 'image|mimes:jpg,png,jpeg'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if ($req->file('avatar')){
            $avatar = $req->file('avatar');
            $ext = $avatar->getClientOriginalExtension();
            $name = "user-" . uniqid() . ".$ext";
            $avatar->move(public_path('uploads/avatars'), $name);
        }

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'avatar' => $name ?? null,
            'access_token' => Str::random(64)
        ]);

        return response()->json($user->access_token);
    }

    public function login(Request $req){
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:28',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $is_login = Auth::attempt(['email' => $req->email, 'password' => $req->password]);
        if(! $is_login) return response()->json("invalid credentials");

        $user = User::where('email', '=', $req->email)->first();

        $user->update(['access_token' => Str::random(64)]);

        return response()->json($user->access_token);
    }

    public function logout(Request $req){
        $token = $req->access_token;
        $user = User::where('access_token', $token)->first();
        if($user == null) return response()->json("Token is not correct");
        $user->update(['access_token' => null]);

        return response()->json("Logged Out successfuly");
    }
}
