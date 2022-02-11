<?php

use Coderflex\LaravelPresenter\Tests\Models\Post;
use Coderflex\LaravelPresenter\Tests\Models\User;

it('cannot create new  presenter', function () {
    $this->artisan('presenter:make ')
        ->assertExitCode(1);
})->throws(
    Symfony\Component\Console\Exception\RuntimeException::class, 
    'Not enough arguments (missing: "name").'
)->group('Presenter Command');

it('can create new  presenter', function () {
    $this->artisan('presenter:make UserPresenter')
        ->assertExitCode(0);
})->group('Presenter Command');

it('presents user full name', function () {
    $user = new User([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => '123'
    ]);

    expect($user->present()->fullName)
        ->toEqual('John Doe');
})->group('Presenter Implementation');

it('should implements CanPresent Interface', function () {
    $post = new Post([
            'title' => 'a title for a post'
        ]);

    $post->present()->slug;
})->throws(
    Coderflex\LaravelPresenter\Exceptions\PresenterException::class,
    'Coderflex\LaravelPresenter\Tests\Models\Post should implements \Coderflex\LaravelPresenter\Concerns\CanPresent interface'
)->group('Presenter Implementation');


