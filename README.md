# urlShortener

This package implements a URL shortener in your Laravel project, using a migration and two access routes. It also comes with a configuration file to adjust what you consider necessary.

## Installation

Use composer to install the package.

```
composer require mlopez/url-shortener
```

Optionally, you can publish the configuration file and the migration.


```
php artisan vendor:publish --tag=url-shortener-migrations
```

```
php artisan vendor:publish --tag=url-shortener-config
```

After composer installs the package, run the following command to run the migration and register the routes.

```
php artisan url-shortene:install
```

## Credits

- [Miguel Lopez Ariza](https://github.com/parrotsoft)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.