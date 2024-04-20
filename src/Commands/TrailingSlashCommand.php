<?php

namespace Vormkracht10\TrailingSlash\Commands;

use Illuminate\Console\Command;

class TrailingSlashCommand extends Command
{
    public $signature = 'laravel-trailing-slash';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
