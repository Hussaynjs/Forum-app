<?php

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia;

uses(RefreshDatabase::class);

use function Pest\Laravel\get;

it('should return a valid inertia response', function(){
    get(route('posts.index'))
    ->assertInertia(fn (AssertableInertia $assertableInertia) => $assertableInertia
    ->component('Posts/Index', true)
    );
});

it('passes posts from the post service to the component', function () {
    $posts = Post::factory()->count(2)->create();

    get(route('posts.index'))
        ->assertInertia(fn (AssertableInertia $page) => $page
            ->component('Posts/Index')
            ->has('posts', 2)
            ->where('posts.0.id', $posts[0]->id)
            ->where('posts.1.id', $posts[1]->id)
        );
});