<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider){
        $user = Socialite::driver($provider)->stateless()->user();


        $user = User::firstOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
            'password' => 'password',

        ]);
        // dd($user);

        Auth::login($user);

        return redirect('/dashboard');

    }
}
