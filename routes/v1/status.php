<?php

use App\Http\Controllers\API\V1\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/status', [
    StatusController::class,
    'get'
]);
