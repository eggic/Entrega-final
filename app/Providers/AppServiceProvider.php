<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Pedido;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('layouts.navbar', function ($view) {
            $pedido = null;
            if (auth()->check()) {
                $pedido = Pedido::where('usuario_id', auth()->id())->latest()->first();
            }
            $view->with('pedido', $pedido);
        });
    }
}
