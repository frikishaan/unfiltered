<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WallController;

Route::get('/', WallController::class)->name('wall');