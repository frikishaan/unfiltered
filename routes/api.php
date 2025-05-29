<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;

Route::post('/post/{post}/like', LikeController::class)->name('post.like');