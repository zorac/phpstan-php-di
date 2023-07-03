# PHPStan PHP-DI

[![Software license][ico-license]](LICENSE)
[![PHP version][ico-php]][link-php]
[![Latest release][ico-packagist]][link-packagist]

A PHPStan extension to support PHP-DI.

## Features

* Instance properties with a PHP-DI `#[Inject]` attribute will be recognized as
  always written.

## Installation

First, install the package via composer as a development dependency:

```sh
composer require --dev zorac/phpstan-php-di
```

Then add the extension to the `includes` sectiopn of your `phpstan.neon`:

```neon
includes:
  - ./vendor/zorac/phpstan-php-di/extension.neon
```

[ico-license]: https://img.shields.io/github/license/zorac/phpstan-php-di.svg?style=flat-square
[ico-php]: https://img.shields.io/packagist/php-v/zorac/phpstan-php-di.svg?style=flat-square
[ico-packagist]: https://img.shields.io/packagist/v/zorac/phpstan-php-di.svg?style=flat-square
[link-php]: https://www.php.net/
[link-packagist]: https://packagist.org/packages/zorac/phpstan-php-di
