<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- PASTIKAN BARIS INI ADA

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
        // TAMBAHKAN BARIS INI: Paksa HTTPS jika berjalan di server online (Railway)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
