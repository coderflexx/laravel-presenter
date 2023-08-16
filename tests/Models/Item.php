<?php

namespace Coderflex\LaravelPresenter\Tests\Models;

use Coderflex\LaravelPresenter\Concerns\CanPresent;
use Coderflex\LaravelPresenter\Concerns\UsesPresenters;
use Illuminate\Database\Eloquent\Model;

class Item extends Model implements CanPresent
{
    use UsesPresenters;

    protected $guarded = [];
}
