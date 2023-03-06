<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm(){
        return view('users.register');
    }

    public function register(Request $req){
        $req->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:28',
            'avatar' => 'image|mimes:jpg,png,jpeg'
        ]);

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
            'avatar' => $name ?? null
        ]);

        Auth::login($user);

        return redirect(route('books.index'));

    }

    public function loginForm(){
        return view('users.login');
    } 

    public function login(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $email = $req->email;
        $password = $req->password;

        $is_login = Auth::attempt(['email' => $email, 'password' => $password]);

        if(! $is_login) return back();

        return redirect(route('books.index'));
    }

    public function logout(){
        Auth::logout();

        return redirect(route('books.index'));
    }
}