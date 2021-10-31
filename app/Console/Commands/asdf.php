<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class asdf extends Command
{
    protected $signature = 'asdf';

    public function handle()
    {
        $this->info('asdf');

        $this->newLine();

        return 0;
    }
}
