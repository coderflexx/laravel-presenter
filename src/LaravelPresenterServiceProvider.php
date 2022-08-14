<?php

namespace Coderflex\LaravelPresenter;

use Coderflex\LaravelPresenter\Console\{
    MakePresenterCommand,
    PresenterMakeCommand
};
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasCommand(MakePresenterCommand::class)
            ->hasCommand(PresenterMakeCommand::class);
    }
}
