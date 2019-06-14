<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        
        view()->composer('layouts.index' , function($view) {
            $categories = \App\Category::all();
            $categories = $categories->chunk(round($categories->count() / 2));

            $view->with(compact('categories')) ;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
