<?php

namespace Coderflex\LaravelPresenter\Tests\Models;

use Coderflex\LaravelPresenter\Concerns\CanPresent;
use Coderflex\LaravelPresenter\Concerns\UsesPresenters;
use Coderflex\LaravelPresenter\Tests\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements CanPresent
{
    use UsesPresenters;

    protected $guarded = [];

    protected $presenters = [
        'default' => UserPresenter::class,
    ];
}
