<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
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
        try{
            $socialUser = Socialite::driver($provider)->user();
            // if(User::where('email', $socialUser->getEmail())->exists()){
            //     return redirect('/login')->withErrors(['email' => 'This email uses different method to login']);
            // }

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
            ])->first();

            if(!$user){
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now(),
                ]);
            }
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }
        catch (Exception $e){
            return redirect('/login');
        }
        
        
       
    }
}
