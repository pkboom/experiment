<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        // dump(DB::connection()->getSchemaBuilder()->getColumnListing('users'));
        // dump(DB::connection()->table('users'));
    }
}
