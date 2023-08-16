<?php

namespace Coderflex\LaravelPresenter\Tests\Presenters;

;

use Coderflex\LaravelPresenter\Presenter;

class ItemPresenter extends Presenter
{
    public function slug()
    {
        return str($this->model->title)->slug()->toString();
    }
}
