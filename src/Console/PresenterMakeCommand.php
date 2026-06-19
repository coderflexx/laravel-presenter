<?php

namespace Coderflex\LaravelPresenter\Console;

class PresenterMakeCommand extends MakePresenterCommand
{
    public $name = 'presenter:make';

    protected function configure(): void
    {
        $this->setHidden(true);
    }
}
