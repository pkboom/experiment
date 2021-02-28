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
        while (true) {
            if ($this->supportsAsyncSignals()) {
                $this->listenForSignals();
            }

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

            sleep(1);
        }

        return 0;
    }

    protected function supportsAsyncSignals()
    {
        return extension_loaded('pcntl');
    }

    protected function listenForSignals()
    {
        pcntl_async_signals(true);

        pcntl_signal(SIGTERM, function () {
            Log::info('end retrieving');

            // email that retrieving events stopped.
        });
    }
}
