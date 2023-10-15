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

class GithubAuthController extends Controller
{
    /**
     * Redirect the user to the Github authentication page
     *
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Log ins the user
     * @return RedirectResponse
     */
    public function handleCallback(): RedirectResponse
    {
        $gitUser = Socialite::driver('github')->user();
        $user = User::firstOrCreate(
            [
                'social_id' => $gitUser->id,
            ],
            [
                'name' => $gitUser->name,
                'email' => $gitUser->email,
                'social_type' => 'Github',
                'email_verified_at' => Date::now()
            ]
        );
        Mail::to($user->email)->send(new SocialiteLoginMail($user));
        Auth::login($user);
        return redirect()->intended();
    }
}
