<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    /**
     * Obtain the user information from Vkontakte.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('vkontakte')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->accessTokenResponseBody['email'])->first();

        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name      = $user->name;
            $newUser->screen_name     = $user->user['screen_name'];
            $newUser->email           = $user->accessTokenResponseBody['email'];
            $newUser->vk_id           = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->save();

            auth()->login($newUser, true);
        }
        return redirect()->to('/');
    }
}