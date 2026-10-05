<?php

namespace App\Services\Posts;

use App\Contracts\Posts\PostService;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class EloquentPostService implements PostService
{
    /**
     * @return Collection<int, Post>
     */
    public function all(): Collection
    {
        return Post::query()->orderBy('id')->get();
    }
}
