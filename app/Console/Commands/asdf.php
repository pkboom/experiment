<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class asdf extends Command
{
    protected $signature = 'asdf';

    public function handle()
    {
        $startServerCommand = 'php -S localhost:8181 -t ./tests/Server/public > /dev/null 2>&1 & echo $!';

        $pid = exec($startServerCommand);
        dump($pid);

        return 0;
    }
}
