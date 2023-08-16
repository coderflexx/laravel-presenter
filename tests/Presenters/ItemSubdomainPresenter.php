<?php

namespace Coderflex\LaravelPresenter\Tests\Presenters;

;

use Coderflex\LaravelPresenter\Presenter;

class ItemSubdomainPresenter extends Presenter
{
    public function caps()
    {
        return str($this->model->title)->upper()->toString();
    }
}
