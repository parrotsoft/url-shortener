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

## Test

```php
public function test_url_shortener()
{
    $this->post(route('links.store'), [
        'long_url' => 'https://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers'
    ]);

    $this->assertDatabaseHas(config('urlshortener.table'), [
        'long_url' => 'https://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers'
    ]);
}
```
### Response

```json
{
  "id": 16,
  "long_url": "https://stackoverflow.com/questions/417142/what-is-the-maximum-length-of-a-url-in-different-browsers",
  "code": "5TPcKQ",
  "short_url": "https://123url.com/5TPcKQ", 🏹
  "updated_at": "2023-03-25T04:59:32.000000Z",
  "created_at": "2023-03-25T04:59:32.000000Z"
}
```


## Credits

- [Miguel Lopez Ariza](https://github.com/parrotsoft)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.