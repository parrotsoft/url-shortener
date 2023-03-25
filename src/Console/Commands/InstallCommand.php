<?php

namespace Mlopez\UrlShortener\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    protected $signature = 'url-shortene:install';

    protected $description = 'Run the migrations';

    public function handle()
    {
        $this->call('migrate', [
            '--path' => 'vendor/mlopez/url-shortener/src/database/migrations',
        ]);

        $this->info('Installation completed successfully.');
    }
}