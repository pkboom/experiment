<?php

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Pkboom\RouteUsage\Models\RouteHistory;
use Pkboom\PostmarkWebhook\PostmarkMessage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
            'name' => 'keunbae',
            'email' => 'asdf@asdf.com',
            'password' => Hash::make('asdfasdf'),
        ]);
        
        // Collection::times(100, function ($key) {
        //     RouteHistory::create([
        //         'method' => 'GET',
        //         'uri' => '/',
        //         'referer' => Arr::random(['google.com', 'facebook.com', 'twitter.com']),
        //     ]);
        // });

        // factory(PostmarkMessage::class, 100)->create();
    }
}
