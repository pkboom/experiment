<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use JsonStreamingParser\Listener\SimpleObjectQueueListener;

class RetrieveEvents extends Command
{
    protected $signature = 'retrieve:events';

    public function handle()
    {
        Log::info('=-------------------------------------------------------------retrieving events');

        $url = 'http://api.sportradar.us/nhl/trial/stream/en/events/subscribe?api_key=nbqpwfg6z6kv4xezfnb46dnu';
        $stream = fopen($url, 'r');

        $listener = new SimpleObjectQueueListener(function ($object) {
            Log::info($object);
        });

        try {
            // $parser = new \JsonStreamingParser\Parser($stream, $listener);
            $parser = new \JsonStreamingParser\Parser($stream, $listener, "\n", false, 32);

            $parser->parse();

            fclose($stream);
        } catch (Exception $e) {
            fclose($stream);

            Log::info($e);
        }

        return 0;
    }
}
