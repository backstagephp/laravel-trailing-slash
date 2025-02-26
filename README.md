# Backstage: Laravel Trailing Slash

[![Latest Version on Packagist](https://img.shields.io/packagist/v/backstage/laravel-trailing-slash.svg?style=flat-square)](https://packagist.org/packages/backstage/laravel-trailing-slash)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/backstagephp/laravel-trailing-slash/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/backstagephp/laravel-trailing-slash/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/backstagephp/laravel-trailing-slash/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/backstagephp/laravel-trailing-slash/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/backstage/laravel-trailing-slash.svg?style=flat-square)](https://packagist.org/packages/backstage/laravel-trailing-slash)

Use Laravel explicitly with or without trailing slashes, controlling URL generation and proper redirects for SEO. Works out of the box on installation, without modifications to your application code.

## Installation

You can install the package via composer:

```bash
composer require backstage/laravel-trailing-slash
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-trailing-slash-config"
```

This is the contents of the published config file:

```php
return [
    // Enable or disable trailing slashes
    'trailing' => env('TRAILING_SLASHES', true),

    // Enable or disable automatic setup of this package
    // When enabled, only installing this package is sufficient for everything to work
    'auto' => env('TRAILING_SLASHES_AUTO', true),

    // Execute middleware only on these methods
    'methods' => [
        'GET', 'HEAD', 'OPTIONS',
    ],
];
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Mark van Eijk](https://github.com/markvaneijk)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
