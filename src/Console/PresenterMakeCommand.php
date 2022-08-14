<?php

namespace Coderflex\LaravelPresenter\Console;

use Illuminate\Console\GeneratorCommand;

class PresenterMakeCommand extends MakePresenterCommand
{
    public $name = 'presenter:make';
    
    protected function configure()
    {
        $this->setHidden(true);
    }
    
}
