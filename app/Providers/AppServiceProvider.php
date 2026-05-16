<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Memastikan fasad URL ter-import dengan benar

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * PENGAMAN MIXED CONTENT (HTTPS FORCE)
         * Memaksa Laravel mengubah skema URL asset, @vite, dan route menjadi HTTPS.
         * Kode ini memeriksa sistem config aplikasi DAN variabel env Docker secara bersamaan.
         */
        if (config('app.env') === 'production' || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
