<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use function Termwind\{render};

class asdf extends Command
{
    protected $signature = 'asdf';

    public function handle()
    {
        render('<div class="p-2 bg-green-300">Termwind</div>');

        return 0;
    }
}
