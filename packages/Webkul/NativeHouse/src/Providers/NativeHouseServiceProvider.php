<?php

namespace Webkul\NativeHouse\Providers;

use Illuminate\Support\ServiceProvider;

class NativeHouseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(
            __DIR__ . '/../Resources/views',
            'native-house'
        );

        $this->loadTranslationsFrom(
            __DIR__ . '/../Resources/lang',
            'native-house'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}