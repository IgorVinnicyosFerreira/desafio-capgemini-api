<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SqliteDBServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $databaseFile = config('database.connections.sqlite.database');
        if (!file_exists($databaseFile)) {
            info('Make Sqlite File "' . $databaseFile . '"');
            file_put_contents($databaseFile, '');
        }
    }
}
