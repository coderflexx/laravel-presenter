<?php

namespace Coderflex\LaravelPresenter\Tests\Presenters;;

use Coderflex\LaravelPresenter\Presenter;

class UserPresenter extends Presenter
{
    public function fullName()
    {
        return "{$this->model->first_name} {$this->model->last_name}";
    }
}
