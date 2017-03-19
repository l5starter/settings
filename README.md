
# L5Starter\Setting

## Installation

In order to install Laravel 5, just add

``` php
"l5starter/setting": "5.3.x-dev"
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

Add menu in `resources/views/vendor/l5starter/admin/partials/sidebar.blade.php`

``` html
<li class="{{ (Request::is('admin/settings*') ? 'active' : '') }}">
    <a href="{{ route('admin.settings.index') }}">
        <i class="fa fa-cog"></i> <span>{{ trans('l5starter::general.settings') }}</span>
    </a>
</li>
```
