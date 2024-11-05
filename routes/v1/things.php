<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\GetThingsController;

Route::get('/things', GetThingsController::class);
