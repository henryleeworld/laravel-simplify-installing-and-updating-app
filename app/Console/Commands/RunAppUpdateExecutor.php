<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunAppUpdateExecutor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'executor:app-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the AppUpdate executor class.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new \App\Executor\AppUpdate())->run();
    }
}
