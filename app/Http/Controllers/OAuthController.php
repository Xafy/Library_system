<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(){
        $git_user = Socialite::driver('github')->user();

        $user = User::updateOrCreate(
            ['email' => $git_user->email],
            [
            'name' => $git_user->name,
            'email' => $git_user->email,
            'password' => Hash::make('123456'),
            'avatar' => $git_user->avatar,
            'oauth_token' => $git_user->token
            ]
        );

        Auth::login($user);

        return redirect(route('books.index'));
    }

}
