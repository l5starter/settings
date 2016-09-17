
# L5Start\Setting

## Installation

In order to install Laravel 5, just add

``` php
"l5starter/setting": "5.2.x-dev"
```
to your composer.json. Then run `composer install` or `composer update`.

Then in your `config/app.php` add in `providers`

``` php
L5Starter\Setting\SettingServiceProvider::class,
```

Publish Configuration

``` php
php artisan vendor:publish --provider="L5Starter\Setting\SettingServiceProvider"
```

Running Migrations

``` bash
$ php artisan migrate
```

Running Seeders

``` bash
$ php artisan db:seed --class=SettingsTableSeeder
```
