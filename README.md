# Viber Bot

[![Latest Version](https://img.shields.io/github/release/paragraf-lex/viber-bot.svg?style=flat-square)](https://github.com/paragraf-lex/viber-bot/releases)

## Installation

This package can be installed through Composer.

``` bash
composer require paragraf-lex/viber-bot
```

In Laravel 5.5 and above the package will autoregister the service provider. In Laravel 5.4 you must install this service provider.

```php
// config/app.php
'providers' => [
    ...
    Paragraf\ViberBot\ViberBotServiceProvider::class,
    ...
];
```

Optionally, you can publish the config file of this package with this command:

``` bash
php artisan vendor:publish --provider="Paragraf\ViberBot\ViberBotServiceProvider"
```

The following config file will be published in `config/viberbot.php`

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email nemanja.ivankovic@paragraf.rs instead of using the issue tracker.

## Credits

- [Nemanja Ivankovic](https://github.com/necko1996)
- [All Contributors](../../contributors)
