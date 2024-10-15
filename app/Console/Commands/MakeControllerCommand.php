<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeControllerCommand extends Command
{
    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-controller-command {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a Contoller';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = base_path('App/Http/Controllers/'.$this->argument('name').'Controller.php');

        $content = file_get_contents(base_path('stubs/controller.custom.stub'));

        $content = str_replace('{{ name }}', $this->argument('name'), $content);
        $content = str_replace('{{ lcname }}', lcfirst($this->argument('name')), $content);


        if (file_exists($path)) {
            $this->error("File : {$path} already exits");
        } else {
            $this->files->put($path, $content);
            $this->info("File : {$path} created");
        }
    }
}
