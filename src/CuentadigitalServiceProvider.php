<?php

namespace Alariva\Cuentadigital;

use Alariva\Cuentadigital\Cuentadigital;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;

class CuentadigitalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('cuentadigital', function (Container $app) {
            $cuentadigital = new Cuentadigital();

            return $cuentadigital;
        });
    }
}
