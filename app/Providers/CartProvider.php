<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

class CartProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $cart = Cart::where('user', auth()->id())->get(); // Substitua pelo método correto para obter o carrinho de compras
            $view->with('cartList', $cart);
        });
    }
}
