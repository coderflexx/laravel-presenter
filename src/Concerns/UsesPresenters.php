<?php

namespace Coderflex\LaravelPresenter\Concerns;

use Coderflex\LaravelPresenter\Exceptions\PresenterException;

/**
 * Uses Presenters Trait
 */
trait UsesPresenters
{
    /**
     * Check the given presenters value exists or not
     *
     * @param string $type
     * @return mixed
     */
    public function present(string $type = 'default')
    {
        if (array_key_exists($type, $this->presenters)) {
            return new $this->presenters[$type]($this);
        }

        throw new PresenterException();
    }
}
