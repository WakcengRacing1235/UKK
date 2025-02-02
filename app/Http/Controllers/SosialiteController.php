<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SosialiteController extends Controller
{
    // function : googleLogin
    // Descriptiom : this function will redirect to google
    // @param NA
    // @return void
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    // function : googleLogin
    // Descriptiom : this function will authenticaion the user through the google account
    // @param NA
    // @return void
    public function googleAuthentication()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                return redirect()->route('alumni.dashboard');
            } else {
                $userData = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('Password1234'),
                    'google_id' => $googleUser->id,
                ]);

                if ($userData) {
                    Auth::login($userData);
                    return redirect()->route('alumni.dashboard');
                }
            }

            dd($googleUser);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
