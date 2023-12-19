# Laravel Presenter

[![The Latest Version on Packagist](https://img.shields.io/packagist/v/coderflexx/laravel-presenter.svg?style=flat-square)](https://packagist.org/packages/coderflexx/laravel-presenter)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/coderflexx/laravel-presenter/run-tests.yml?branch=main&label=tests)](https://github.com/coderflexx/laravel-presenter/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/coderflexx/laravel-presenter/phpstan.yml?branch=main&label=code%20style)](https://github.com/coderflexx/laravel-presenter/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/coderflexx/laravel-presenter.svg?style=flat-square)](https://packagist.org/packages/coderflexx/laravel-presenter)

A clean way to present your model attributes without putting them in the wrong file.


- [Laravel Presenter](#laravel-presenter)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Model Implementation](#model-implementation)
  - [Create New Model Presenter class](#create-new-model-presenter-class)
  - [Using the `Presenter` Generated Class](#using-the-presenter-generated-class)
  - [Example](#example)
  - [Adding Another Presenter Type](#adding-another-presenter-type)
  - [Testing](#testing)
  - [Changelog](#changelog)
  - [Contributing](#contributing)
  - [Security Vulnerabilities](#security-vulnerabilities)
  - [Credits](#credits)
  - [License](#license)

## Installation

You can install the package via composer:

```bash
composer require coderflexx/laravel-presenter
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Coderflex\LaravelPresenter\LaravelPresenterServiceProvider"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Presenter Namespace
    |--------------------------------------------------------------------------
    |
    | This value informs LaravelPresenter which namespace you will be 
    | selecting to store your presenters by default.
    | If this value equals to null, "App\Presenter" will be used 
    | by default.
    |
    */

    'presenter_namespace'   => 'App\\Presenters',
];
```

## Usage
The implementation of this package is so simple, all what you need to do is the following:

## Model Implementation

-  Implement `CanPresent` Interface 
-  Use `UsesPresenters` Trait

```php
use Coderflex\LaravelPresenter\Concerns\CanPresent;
use Coderflex\LaravelPresenter\Concerns\UsesPresenters;
// ...

class User extends Authenticatable implements CanPresent
{
    use UsesPresenters;

    // ...
}
```

## Create New Model Presenter class

This package gives you an easy way to generate new `Presenter` class, all you need to do is to use `presenter:make` command.

```bash
php artisan presenter:make UserPresenter
```

`UserPresenter` in our case, leaves by default in `App\Presenters`.

This is the contents of the `UserPresenter` file:

```php
<?php

namespace App\Presenters;

use Coderflex\LaravelPresenter\Presenter;

class UserPresenter extends Presenter
{
    // 
}

```


If you want to change the directory, you have two options.

First options is to set the full namespace while you're creating the presenter class

```bash
php artisna presenter:make App\Models\Presenter\UserPresenter
```

Or change `presenter_namespace` from `config/laravel-presenter` file.

```php
return [
    ...

    'presenter_namespace'   => 'App\\Presenters',

    ...
];
```

## Using the `Presenter` Generated Class
After you create the presenter class, you need to register it on the `Model` by adding the `$presenters` protected property:

```php
use App\Presenters\UserPresenter;
use Coderflex\LaravelPresenter\Concerns\CanPresent;
use Coderflex\LaravelPresenter\Concerns\UsesPresenters;
// ...

class User extends Authenticatable implements CanPresent
{
    use UsesPresenters;

    protected $presenters = [
        'default' => UserPresenter,
    ];
}
```
By default, the type of your presenter class is `default`, but you can use as many of presenters you want, just by identifying the type in `$presenters` property.

## Example
Now, after we generated the `presenter` class, and we implemented it successfully in our model, we can use it like so:

In your `UserPresenter` class or any presenter class you generated.

```php
...
class UserPresenter extends Presenter
{
    public function fullName()
    {
        return "{$this->model->first_name} {$this->model->last_name}";
    }
}
...
```

We add a new method to present the `fullName`.

In your blade or any place you want, you can do:

```php
$user->present()->fullName
```
Your application will show the full name from the method you added.

## Adding Another Presenter Type
Like I said above, by default the type will be `default` but, you can add more types as you need.

Here is an example:

```php
use App\Presenters\UserPresenter;
use Coderflex\LaravelPresenter\Concerns\CanPresent;
use Coderflex\LaravelPresenter\Concerns\UsesPresenters;
// ...

class User extends Authenticatable implements CanPresent
{
    use UsesPresenters;

    protected $presenters = [
        'default' => UserPresenter,
        'setting' => UserSettingPresenter,
    ];
}
```

Generate new `UserSettingPresenter`

```bash
php artisan presenter:make UserSettingPresenter
```

Add anything to `UserSettingPresenter` method

```php
...
class UserSettingPresenter extends Presenter
{
    public function lang()
    {
        return $this->model->settings->defaultLang;
    }
}
...
```

Finally, set `setting` as a type:

```php
$user->present('setting')->lang;
```

By that, you can split your logic and make your code base even cleaner.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oussama Sid](https://github.com/ousid)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
