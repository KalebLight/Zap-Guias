<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        
        // dd($provider);
        $user  = User::updateOrCreate([
                'provider_id' => $socialUser->id, 
                'provider' => $socialUser->$provider
        ],[
                'name' => $socialUser->name,
                'username' => $socialUser->getNickname(),
                'email' => $socialUser->email,       
                'provider' => $provider,
                'provider_token' => $socialUser->token,
            ]
        );
        Auth::login($user);
        return redirect()->intended('/dashboard');
    }
}
