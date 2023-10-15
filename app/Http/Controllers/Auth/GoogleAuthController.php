<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SocialiteLoginMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Laravel\Socialite\Facades\Socialite;
use Mail;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page
     *
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->with(["prompt" => "select_account"])->redirect();
    }

    /**
     * Logs in the user
     * @return RedirectResponse
     */
    public function handleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::firstOrCreate(
            [
                'social_id' => $googleUser->id,
            ],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'social_type' => 'Google',
                'email_verified_at' => Date::now()
            ]
        );
        Mail::to($user->email)->send(new SocialiteLoginMail($user));
        Auth::login($user);
        return redirect()->intended();
    }
}
