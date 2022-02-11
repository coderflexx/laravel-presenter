<?php

namespace Coderflex\LaravelPresenter\Concerns;

interface CanPresent
{
    /**
     * Check the given presenters value exists or not
     *
     * @param string $type
     * @return mixed
     */
    public function present(string $type = 'default');
}
