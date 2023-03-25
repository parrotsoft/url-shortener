<?php

use Illuminate\Support\Facades\Route;
use Mlopez\UrlShortener\Controllers\LinkController;

Route::post('/', [LinkController::class, 'store'])->name('links.store');
Route::get('/{code}', [LinkController::class, 'show'])->name('links.show');