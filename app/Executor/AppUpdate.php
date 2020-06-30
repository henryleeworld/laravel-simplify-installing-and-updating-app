<?php

namespace App\Executor;

use AshAllenDesign\LaravelExecutor\Classes\Executor;

class AppUpdate extends Executor
{
    /**
     * Define the commands here that are to be run when
     * this executor class is called.
     *
     * @return Executor
     */
    public function run(): Executor
    {
        return $this->simpleDesktopNotification('Starting Executor', 'Starting the AppUpdate Executor.')
                    ->runExternal('composer install')
                    ->runArtisan('key:generate')
                    ->runArtisan('migrate --seed')
                    ->runArtisan('cache:clear')
                    ->runArtisan('route:clear')
                    ->runArtisan('config:clear')
                    ->runArtisan('view:clear')
                    ->completeNotification();
    }
}
