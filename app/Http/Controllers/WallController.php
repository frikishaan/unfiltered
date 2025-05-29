<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class WallController
{
    public function __invoke()
    {
        if(! request()->hasHeader('X-Inertia') && request()->has('page')) {
            return redirect()->route('wall');
        }
        
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
    
        return Inertia::render('Wall', [
            'posts' => Inertia::deepMerge($posts),
        ]);
    }
}
