<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Pkboom\RouteUsage\Models\RouteHistory;

class WelcomeController extends Controller
{
    public function index()
    {
        RouteHistory::create([
            'method' => 'GET',
            'uri' => '/',
            'referer' => Arr::random(['google.com', 'facebook.com', 'twitter.com']),
        ]);

        return view('welcome');
    }
}
