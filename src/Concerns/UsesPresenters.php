<?php

namespace Coderflex\LaravelPresenter\Concerns;

use Coderflex\LaravelPresenter\Exceptions\PresenterException;
use Illuminate\Support\Str;

/**
 * Uses Presenters Trait
 */
trait UsesPresenters
{
    /*
    |--------------------------------------------------------------------------
    | Presenters
    |--------------------------------------------------------------------------
    |
    | Presenters can be defined as a single item in $this->presenter or
    | as an array of $this->presenters. If neither are set, then we will
    | generate a default based on the Model and type (if set).
    |
    */

    /**
     * @throws PresenterException
     */
    public function present(string $type = 'default'): mixed
    {
        $presenter = $this->getDefaultPresenterName($type);

        if (! is_null($this->presenters) && is_array($this->presenters)) {
            if (array_key_exists($type, $this->presenters)) {
                $presenter = $this->presenters[$type];
            } else {
                throw new PresenterException();
            }

        } elseif (isset($this->presenter) && is_string($this->presenter)) {
            $presenter = $this->presenter;
        }

        if (class_exists($presenter)) {
            return new $presenter($this);
        }

        throw new PresenterException();
    }

    /*
    |--------------------------------------------------------------------------
    | Default Presenter Names
    |--------------------------------------------------------------------------
    |
    | By default, the presenter name is defined based on the name of the
    | Model class. The default namespace is \App\Presenters. So, the Model
    | Day has Presenter DayPresenter. However, if you supply a type, e.g. then it
    | would be DayTypePresenter.
    |
    */

    private function getDefaultPresenterName($type)
    {
        $modelNameModifier = $type === 'default' ? '' : $type;

        return Str::of(get_class())
            ->replace('Models', 'Presenters')
            ->append(str($modelNameModifier)->ucfirst())
            ->append('Presenter')
            ->toString();
    }
}
