<?php

namespace Coderflex\LaravelPresenter;

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

