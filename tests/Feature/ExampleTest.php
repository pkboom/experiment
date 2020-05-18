<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $user = factory(User::class)->create();

        dump($user->created_at);

        DB::enableQueryLog();

        $user->update(['created_at' => DB::raw('DATE_ADD("created_at", INTERVAL -1 YEAR')]);

        dump(DB::getQueryLog());
        dd($user->created_at);
    }
}
