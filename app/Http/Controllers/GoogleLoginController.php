<?php

namespace App\Http\Controllers;

use Google_Service_Sheets;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function login()
    {
        Session::put('redirectUrlAfterGoogleLogin', URL::previous());

        return Socialite::driver('google')
            ->scopes(Google_Service_Sheets::SPREADSHEETS)
            ->redirect();
    }

    public function handleProviderCallback()
    {
        Cache::put('google_sheet_token', Socialite::driver('google')->user()->token, 3600);

        $redirectTo = Session::get('redirectUrlAfterGoogleLogin', URL::to('/'));

        return Redirect::to($redirectTo)->with('success', 'Signed in to Google.');
    }
}
