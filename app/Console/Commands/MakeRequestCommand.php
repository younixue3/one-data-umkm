<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRequestCommand extends Command
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
    protected $signature = 'app:make-request-command {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a Request';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = base_path('App/Http/Requests/'. $this->argument('name').'/');
        $this->files->makeDirectory($path, 0777, true);

        $contentStore = file_get_contents(base_path('stubs/request.store.stub'));
        $contentUpdate = file_get_contents(base_path('stubs/request.update.stub'));


        if (file_exists($path . 'Store'.$this->argument('name').'Request.php')) {
            $this->error("File Store : {$path} already exits");
        } else {
            $contentStore = str_replace('{{ name }}', $this->argument('name'), $contentStore);
            $contentStore = str_replace('{{ lcname }}', lcfirst($this->argument('name')), $contentStore);
            $this->files->put($path . 'Store'.$this->argument('name').'Request.php', $contentStore);
            $this->info("File Store : {$path} created");
        }

        if (file_exists($path . 'Update'.$this->argument('name').'Request.php')) {
            $this->error("File Update : {$path} already exits");
        } else {
            $contentUpdate = str_replace('{{ name }}', $this->argument('name'), $contentUpdate);
            $contentUpdate = str_replace('{{ lcname }}', lcfirst($this->argument('name')), $contentUpdate);
            $this->files->put($path . 'Update'.$this->argument('name').'Request.php', $contentUpdate);
            $this->info("File Update : {$path} created");
        }
    }
}
