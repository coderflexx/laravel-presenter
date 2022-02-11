<?php

namespace Coderflex\LaravelPresenter\Tests\Models;;

use Coderflex\LaravelPresenter\Concerns\UsesPresenters;
use Coderflex\LaravelPresenter\Tests\Presenters\PostPresenter;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use UsesPresenters;

    protected $guarded = [];

    protected $presenters = [
        'default' => PostPresenter::class,
    ];
}
