<?php

use Coderflex\LaravelPresenter\Tests\Models\Post;
use Coderflex\LaravelPresenter\Tests\Models\User;

it('cannot create new presenter without a name argument', function () {
    $this->markTestSkipped(
        __('In laravel V9.*, and above versions, it can put a question for the name argument, if it\'s not presented.')
    );

    $this->artisan('presenter:make ')
        ->assertExitCode(1);
})->throws(
    Symfony\Component\Console\Exception\RuntimeException::class,
    'Not enough arguments (missing: "name").'
)->group('Presenter Command');

it('can create new presenter class', function () {
    $this->artisan('presenter:make UserPresenter')
        ->assertExitCode(0);
})->group('Presenter Command');


it('can create new presenter class with the alias command', function () {
    $this->artisan('make:presenter UserPresenter')
        ->assertExitCode(0);
})->group('Presenter Command');

it('presents user full name', function () {
    $user = new User([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => '123',
    ]);

    expect($user->present()->fullName)
        ->toEqual('John Doe');
})->group('Presenter Implementation');

it('presents user lang from another presenter type', function () {
    $user = new User([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => '123',
    ]);

    expect($user->present('setting')->lang)
        ->toEqual('en');
})->group('Presenter Implementation');

it('throws an exception if the presenter type does not exists', function () {
    $user = new User([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => '123',
    ]);

    $user->present('profile')->lang;
})->throws(
    Coderflex\LaravelPresenter\Exceptions\PresenterException::class,
    'Presenter not found'
)->group('Presenter Implementation');

it('should implements CanPresent Interface', function () {
    $post = new Post([
            'title' => 'a title for a post',
        ]);

    $post->present()->slug;
})->throws(
    Coderflex\LaravelPresenter\Exceptions\PresenterException::class,
    'Coderflex\LaravelPresenter\Tests\Models\Post should implements \Coderflex\LaravelPresenter\Concerns\CanPresent interface'
)->group('Presenter Implementation');
