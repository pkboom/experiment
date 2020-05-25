<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        dump(request()->all());

        request()->replace([
            'foo' => 'foo',
        ]);

        dump(request()->all());

        return view('welcome');
    }
}
