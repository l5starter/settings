<?php

namespace L5Starter\Setting;

use Illuminate\Support\ServiceProvider;
use L5Starter\Core\Support\DateFormatter;
use L5Starter\Setting\Repositories\SettingRepository;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param SettingRepository $settingRepository
     */
    public function boot(SettingRepository $settingRepository)
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'l5starter');
        // Publishing File
        $this->publishes([__DIR__.'/../database/migrations/' => database_path('migrations')], 'migrations');
        $this->publishes([__DIR__.'/../database/seeds/' => database_path('seeds')], 'seeder');

        if ($settingRepository->setAll()) {
            // This one needs a little special attention
            if (config('settings.dateFormat')) {
                $dateFormats = DateFormatter::formats();
                config(['settings.datepickerFormat' => $dateFormats[config('settings.dateFormat')]['datepicker']]);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
