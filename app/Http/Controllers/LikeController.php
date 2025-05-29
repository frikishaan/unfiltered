<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeController
{
    public function __invoke(Post $post)
    {
        $post->increment('reactions_count');
        return response()->noContent();
    }
}
