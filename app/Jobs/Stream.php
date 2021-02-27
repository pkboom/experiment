<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Stream implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $url = "https://api.sportradar.us/nba/trial/stream/en/events/subscribe?api_key=xu6cdvtaszrbkme87jgt8jjv";
        $stream = fopen($url, 'r');

        $listener = new SimpleObjectQueueListener(function ($object) {
            dump($object);
        });
        try {
            $parser = new \JsonStreamingParser\Parser($stream, $listener, "\n", false, 32);
            $parser->parse();

            fclose($stream);
        } catch (Exception $e) {
            fclose($stream);
            throw $e;
        }
    }
}
