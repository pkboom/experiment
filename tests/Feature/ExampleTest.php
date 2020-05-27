<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        dump('asdf');
        // Notification::resolved(function ($service) {
        //     dd($service);
        // });
    }
}
