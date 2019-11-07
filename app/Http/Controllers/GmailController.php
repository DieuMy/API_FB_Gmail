<?php

namespace App\Http\Controllers;

use Socialite;
use Auth;
use App\User;
class GmailController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
 
        return redirect()->route('home');
    }

    private function findOrCreateUser($gmail){
        $authUser = User::where('gmail_id', $gmail->id)->first();
        if($authUser){
            return $authUser;
        }
 
        return User::create([
            'name' => $gmail->name,
            'password' => $gmail->token,
            'email' => $gmail->email,
            'gmail_id' => $gmail->id,
        ]);
    }
}
