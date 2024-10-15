<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeFeatureCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-feature-command {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a Feature';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        Artisan::call('app:make-repo-command ' . $name);

        Artisan::call('app:make-service-command ' . $name);

        Artisan::call('app:make-dto-command ' . $name);

        Artisan::call('app:make-controller-command ' . $name);

        Artisan::call('app:make-request-command ' . $name);

        Artisan::call('make:model ' . $name);
    }
}
