<?php

namespace App\Console\Commands;

use Clue\React\Stdio\Stdio;
use Illuminate\Console\Command;

class asdf extends Command
{
    protected $signature = 'asdf';

    public function __construct()
    {
        parent::__construct();

        $this->ignoreValidationErrors();
    }

    public function handle()
    {
        $stdio = new Stdio();

        $value = 10;
        $stdio->on("\033[A", function () use (&$value, $stdio) {
            $value++;
            $stdio->setPrompt('Value: '.$value);
        });
        $stdio->on("\033[B", function () use (&$value, $stdio) {
            $value--;
            $stdio->setPrompt('Value: '.$value);
        });

        // hijack enter to just print our current value
        $stdio->on("\n", function () use ($stdio, &$value) {
            $stdio->write("Your choice was $value\n");
        });

        // quit on "q"
        $stdio->on('q', function () use ($stdio) {
            $stdio->end();
        });

        $stdio->on('data', function ($line) {
            echo $line;
        });

        // user can still type all keys, but we simply hide user input
        $stdio->setEcho(false);

        // instead of showing user input, we just show a custom prompt
        $stdio->setPrompt('Value: '.$value);

        $stdio->write('Welcome to this cursor demo
Use cursor UP/DOWN to change value.
Use "q" to quit
');

        return 0;
    }
}
