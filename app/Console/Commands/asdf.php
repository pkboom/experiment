<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class asdf extends Command
{
    protected $signature = 'asdf';

    public function handle(): void
    {
        dump(base_path());
        Process::fromShellCommandline('node ./cli.js', base_path(), null, null, null)->mustRun();
    }
}
