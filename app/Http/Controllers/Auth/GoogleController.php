<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function googleRedirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function googleCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        if($user){
            $user = User::firstOrCreate([
                'email' => $user->email
            ],[
                'name' => $user->name,
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id,
                'password' => encrypt('123456dummy')
            ]);
            Auth::login($user, true);
            return redirect()->route('breeze');
        }else{
            return redirect()->route('login')->with('error','Something went wrong');
        }
    }
}
