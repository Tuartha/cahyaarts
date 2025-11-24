<?php

namespace App\Providers;

use App\Models\HomePage;
use App\Models\AboutPage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function boot(): void
    {
        // Share data ke semua view
        View::share([
            'siteLogo' => AboutPage::first()->image,
            'siteName' => HomePage::first()->title ?? 'Cahya Art\'s Baliqui',
        ]);
    }


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
}
