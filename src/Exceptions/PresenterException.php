<?php

namespace Coderflex\LaravelPresenter\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

class PresenterException extends Exception
{
    /**
     * Exception handling message
     *
     * @var string
     */
    protected $message = 'Presenter not found';

    /**
     * Exception handling status code
     *
     * @var int
     */
    protected $code = 500;

    /**
     * Method for Presenter Implementation absence on the model
     * @param Model $model
     * @return self
     */
    public static function interfaceNotImplemented(Model $model): self
    {
        return new self((
            __(':model should implements :interface interface', [
                        'model' => get_class($model),
                        'interface' => '\Coderflex\LaravelPresenter\Concerns\CanPresent',
                    ])
        ));
    }
}
