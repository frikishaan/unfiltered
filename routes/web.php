<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    if(! request()->hasHeader('X-Inertia') && request()->has('page')) {
        return redirect()->route('wall');
    }
    
    $posts = \App\Models\Post::latest()->paginate(10);

    return Inertia::render('Wall', [
        'posts' => Inertia::deepMerge($posts),
    ]);
})->name('wall');

