# This is my package laravel-presenter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/coderflex/laravel-presenter.svg?style=flat-square)](https://packagist.org/packages/coderflex/laravel-presenter)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/coderflex/laravel-presenter/run-tests?label=tests)](https://github.com/coderflexx/laravel-presenter/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/coderflex/laravel-presenter/Check%20&%20fix%20styling?label=code%20style)](https://github.com/coderflexx/laravel-presenter/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require coderflex/laravel-presenter
```

You can publish the config file with:

```bash
vendor:publish --provider="Coderflex\LaravelPresenter\LaravelPresenterServiceProvider"
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

<!-- TODO: document the package usage -->


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

- [Coderflex](https://github.com/coderflexxx)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
