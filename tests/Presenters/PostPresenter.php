<?php

namespace Coderflex\LaravelPresenter\Tests\Presenters;

;

use Coderflex\LaravelPresenter\Presenter;
use Illuminate\Support\Str;

class PostPresenter extends Presenter
{
    public function slug()
    {
        return Str::slug($this->title);
    }
}
