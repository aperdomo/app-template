<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\GetThingsController;
use App\Http\Controllers\API\V1\GetThingController;

Route::get('/things', GetThingsController::class);
Route::get('/things/{thing_id}', GetThingController::class);
