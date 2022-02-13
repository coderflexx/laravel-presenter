<?php

namespace Coderflex\LaravelPresenter;

use Coderflex\LaravelPresenter\Exceptions\PresenterException;
use Illuminate\Database\Eloquent\Model;

abstract class Presenter
{
    /**
     * Get the model Instance
     *
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        if (! $model instanceof \Coderflex\LaravelPresenter\Concerns\CanPresent) {
            throw PresenterException::interfaceNotImplemented($model);
        }

        $this->model = $model;
    }

    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return call_user_func([$this, $property]);
        }

        return null;
    }
}
