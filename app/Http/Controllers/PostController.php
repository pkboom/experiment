<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
