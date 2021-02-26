<?php

namespace App\Executor;

use AshAllenDesign\LaravelExecutor\Classes\Executor;

class AppBuildUpEexecutor extends Executor
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
                    ->runArtisan('down')
                    ->runArtisan('key:generate')
                    ->runExternal('composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev')
                    ->runArtisan('migrate --seed')
                    ->runArtisan('auth:clear-resets')
                    ->runArtisan('route:cache')
                    ->runArtisan('config:cache')
                    ->runArtisan('view:cache')
                    ->runArtisan('up')
                    ->completeNotification();
    }
}
