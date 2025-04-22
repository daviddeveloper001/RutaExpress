<?php

use Illuminate\Support\Facades\Route;


Route::get('/test-map', function () {
    return view('map-test');
});