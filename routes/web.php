<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('status');
});

Route::get('/sandbox', function () {
    return view('sandbox');
});
