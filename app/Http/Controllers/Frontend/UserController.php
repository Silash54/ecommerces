<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function google_login() {
        return Socialite::driver('google')->redirect();
    }
    public function google_callback()
    {
        $user = Socialite::driver('google')->user();
    
        $findUser = User::where('google_id', $user->id)->first();
        $registerUser = User::where('email', $user->email)->first();
    
        if ($registerUser) {
            Auth::login($registerUser);
            return redirect('/dashboard');
        }
    
        if ($findUser) {
            Auth::login($findUser);
            return redirect('/dashboard');
        }
    
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;  // Corrected here
        $newUser->google_id = $user->id;
        $newUser->password = Hash::make(rand(100000, 999999));
        $newUser->save();
    
        Auth::login($newUser);
        return redirect('/dashboard');
    }
    
}
