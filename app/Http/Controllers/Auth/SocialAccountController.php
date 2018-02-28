<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountsService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($network, SocialAccountsService $service){
        try {


            if (Request::has('denied') || Request::has('error')) {
                return redirect('/');
            }

            $user = $service->findOrCreate(Socialite::driver($network)->user(), $network);
            auth()->login($user,true);

            return redirect('/home');

        } catch (Exception $e) {

            if (Auth::check()) {
                Auth::guard()->logout();
            }

            return redirect('/')->with('status', 'Authentication failed');
        }
    }

}
