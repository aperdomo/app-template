<?php

namespace App\View\Composers;

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
        $view->with('status', 'ok');
    }
}
