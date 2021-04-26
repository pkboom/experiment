<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ContentsController extends Controller
{
    public function index()
    {
        return Inertia::render('Contents/Index', [
            'course' => $section->course->only('id', 'name'),
            'section' => $section->only('id'),
            'elearnings' => Auth::user()->authAccount()->elearnings()
                ->where('is_uploaded', true)
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }

    public function create()
    {
        return Inertia::render('Contents/Create', [
            'course' => $section->course->only('id', 'name'),
            'section' => $section->only('id'),
            'elearnings' => Auth::user()->authAccount()->elearnings()
                ->where('is_uploaded', true)
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }

    public function asdf()
    {
    }
}
