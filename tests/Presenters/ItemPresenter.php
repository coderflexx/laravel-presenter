<?php

namespace Coderflex\LaravelPresenter\Tests\Presenters;

;

use Coderflex\LaravelPresenter\Presenter;
use Illuminate\Support\Str;

class ItemPresenter extends Presenter
{
    public function slug()
    {
        return Str::of($this->model->title)->slug()->toString();
    }
}
