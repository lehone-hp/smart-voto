<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectToProvider()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return Socialite::driver('okta')->redirect();
    }

    public function handleProviderCallback(\Illuminate\Http\Request $request)
    {
        $user = Socialite::driver('okta')->user();

        $localUser = User::where('email', $user->email)->first();

        // create a local user with the email and token from Okta
        if (!$localUser) {
            $localUser = User::create([
                'email' => $user->email,
                'name'  => $user->name,
                'token' => $user->token,
            ]);
        } else {
            // if the user already exists, just update the token:
            $localUser->token = $user->token;
            $localUser->save();
        }

        try {
            Auth::login($localUser);
        } catch (\Throwable $e) {
            return redirect('/login-okta');
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
