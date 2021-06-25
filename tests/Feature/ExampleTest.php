<?php

namespace Tests\Feature;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $message = Message::factory()->create();

        dump($message->address);

        $message->save();
    }
}
