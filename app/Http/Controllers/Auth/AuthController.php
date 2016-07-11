<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Socialite;
use App\User;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    public function __construct()
    {
        $this->redirectPath = '/playlist';
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     *
     */
    public function redirectToProvider($provider)
    {
        $scopes = [
            'https://www.googleapis.com/auth/plus.me',
            'profile',
        ];
        $parameters = ['access_type' => 'online', 'approval_prompt'=>'auto'];
        return Socialite::driver($provider)->scopes($scopes)->with($parameters)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        // $user->token;
        // stroing data to our use table and logging them in
        $data = [
            'name' => $user->getName(),
            'avatar'=> $user->getAvatar(),
            'email' => $user->getEmail()
            //'remember_token' => $user->token
        ];

       // Auth::login(User::firstOrCreate($data)); // problema con este metodo
       $hola = Auth::login(User::firstOrCreate($data));
        
        //after login redirecting to home page
        return redirect($this->redirectPath());
    }
}