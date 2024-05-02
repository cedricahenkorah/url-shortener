<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{code}', [UrlController::class, 'redirect']);

Route::resource('urls', UrlController::class)
    ->only(['index', 'store']);
