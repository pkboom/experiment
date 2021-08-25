<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class asdf extends Command
{
    protected $signature = 'asdf';

    public function handle()
    {
        $codeStatus = shell_exec('code -s');

        $foo = str_contains($codeStatus, 'input.php');
        $bar = str_contains($codeStatus, 'output.json');
        dump($foo);
        dump($bar);

        return 0;
    }
}
