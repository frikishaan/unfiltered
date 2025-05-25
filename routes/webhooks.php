<?php

use App\Http\Middleware\BasicAuth;
use Illuminate\Support\Facades\Route;

Route::post('/inbound', function() {
    
    info(request()->get('FromName'));
    info(request()->get('HtmlBody'));
    
    return response()->noContent(status: 200);
})
    ->middleware([BasicAuth::class])
    ->name('inbound');