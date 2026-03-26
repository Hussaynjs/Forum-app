<?php

use Inertia\Testing\AssertableInertia;

use function Pest\Laravel\get;

it('should return a valid inertia response', function(){
    get(route('posts.index'))
    ->assertInertia(fn (AssertableInertia $assertableInertia) => $assertableInertia
    ->component('Posts/Index', true)
    );
});

it('it should pass posts to the component', function(){
    get(route('posts.index'))
    ->assertInertia(fn (AssertableInertia $assertableInertia) => $assertableInertia
    ->has("posts")
    );
});