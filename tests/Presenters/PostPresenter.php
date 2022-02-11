<?php

namespace Coderflex\LaravelPresenter\Tests\Presenters;;

use Illuminate\Support\Str;
use Coderflex\LaravelPresenter\Presenter;

class PostPresenter extends Presenter
{
    public function slug()
    {
        return Str::slug($this->title);
    }
}
