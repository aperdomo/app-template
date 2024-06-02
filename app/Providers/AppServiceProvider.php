<?php

namespace App\Providers;

use App\View\Composers\StatusComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View as ViewFacade;

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
        ViewFacade::composer(
            [
                'status',
            ],
            StatusComposer::class
        );
    }
}
