<?php

namespace Webkul\CasaNativa\Providers;

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
        // Register the theme's views under the 'native-house' namespace
        $this->loadViewsFrom(
            __DIR__ . '/../Resources/views',
            'native-house'
        );

        // Register the theme's language files
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