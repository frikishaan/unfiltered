<?php

use App\Http\Controllers\InboundEmailController;
use App\Http\Middleware\BasicAuth;
use Illuminate\Support\Facades\Route;

Route::post('/inbound', InboundEmailController::class)
    ->middleware([BasicAuth::class])
    ->name('inbound');
