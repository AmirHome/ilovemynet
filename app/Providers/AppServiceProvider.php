<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Exception;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            if ( !Cache::has('version') ) {
              Cache::put('version', scandir('.git/refs/tags/', SCANDIR_SORT_DESCENDING)[0],30);
            }
        } catch (Exception $e) {
            Cache::put('version', 'err code: 3');
        };
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
