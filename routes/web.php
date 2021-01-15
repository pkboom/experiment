<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Jetstream Auth
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//     ]);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->name('dashboard');

Route::get('/', function () {
    $response = Http::withOptions([
        'base_uri' => 'http://api.sportradar.us',
        'stream' => true,
    ])->get(
        // '/nba/simulation/v7/en/games/2017/SIM/schedule.json?api_key=xu6cdvtaszrbkme87jgt8jjv' // simulation data
        // '/nba/simulation/v7/en/games/12b2e554-c80f-404f-b140-c25400996ac7/summary.json?api_key=xu6cdvtaszrbkme87jgt8jjv' // game summary
        // '/nba/simulation/stream/en/events/subscribe?api_key=xu6cdvtaszrbkme87jgt8jjv&sd:match:12b2e554-c80f-404f-b140-c25400996ac7' // stream data for a game
        // '/nba/simulation/stream/en/events/subscribe?api_key=xu6cdvtaszrbkme87jgt8jjv&sd:team:583ecd4f-fb46-11e1-82cb-f4ce4684ea4c' // stream data for a team
        // '/nba/simulation/v7/en/games/12b2e554-c80f-404f-b140-c25400996ac7/pbp.json?api_key=xu6cdvtaszrbkme87jgt8jjv'
        // '/nhl/simulation/v7/en/games/2017/SIM/schedule.json?api_key=nbqpwfg6z6kv4xezfnb46dnu' // simulation data
        '/nhl/simulation/v7/en/games/0cdfbafa-ee01-415f-85d5-9b7c7fb3af71/summary.json?api_key=nbqpwfg6z6kv4xezfnb46dnu' // game summary
        // '/nhl/simulation/stream/en/clock/subscribe?api_key=nbqpwfg6z6kv4xezfnb46dnu'
        // '/nhl/simulation/stream/en/events/subscribe?api_key=nbqpwfg6z6kv4xezfnb46dnu&sd:match:0cdfbafa-ee01-415f-85d5-9b7c7fb3af71'
      );

    $body = $response->getBody();

    return $body;
    while (!$body->eof()) {
        dump($body->read(128));
    }
});
