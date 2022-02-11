<?php

namespace Coderflex\LaravelPresenter;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Coderflex\LaravelPresenter\Console\PresenterMakeCommand;

class LaravelPresenterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-presenter')
            ->hasConfigFile('laravel-presenter')
            ->hasViews()
            ->hasCommand(PresenterMakeCommand::class);
    }
}
