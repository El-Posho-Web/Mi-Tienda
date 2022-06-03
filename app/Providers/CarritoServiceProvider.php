<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Classes\Carrito;

class CarritoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('carrito',function(){
            return new Carrito();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
