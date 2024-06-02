<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class StatusComposer
{
    /**
     * Create a new composer.
     */
    public function __construct(
    ) {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $routes = array_map(function ($route) {
            return [
                'uri' => $route->uri(),
                'methods' => implode(', ', $route->methods()),
            ];
        }, Route::getRoutes()->getRoutes());

        $view->with([
            'status' => 'ok',
            'time' => now()->format('Y-m-d H:i:s'),
            'routes' => $routes,
        ]);
    }
}
