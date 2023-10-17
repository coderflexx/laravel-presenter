<?php

namespace Coderflex\LaravelPresenter\Tests\Presenters;

;

use Coderflex\LaravelPresenter\Presenter;
use Illuminate\Support\Str;

class ItemSubdomainPresenter extends Presenter
{
    public function caps()
    {
        return Str::of($this->model->title)->upper()->toString();
    }
}
