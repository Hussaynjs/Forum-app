<?php

namespace App\Contracts\Posts;

use Illuminate\Database\Eloquent\Collection;

interface PostService
{
    /**
     * @return Collection<int, \App\Models\Post>
     */
    public function all(): Collection;
}
