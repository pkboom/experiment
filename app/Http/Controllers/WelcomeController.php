<?php

namespace App\Http\Controllers;

use App\Models\User;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome', [
            'users' => User::paginate(),
        ]);
    }
}
