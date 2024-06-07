<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\StatusController;

Route::get('/status', [
    StatusController::class,
    'get'
]);
