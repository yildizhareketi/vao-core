<?php

namespace Atak011\VaoCore\Commands;

use Illuminate\Console\Command;

class VaoCoreCommand extends Command
{
    public $signature = 'vao-core';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
