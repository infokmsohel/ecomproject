<?php

namespace App\Providers;

use App\FooterContact;
use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer(['front.includes.header','front.includes.footer'], function ($view){
           $view->with( ['categories'=>Category::where('publication_status',1)->get()]) ;

        });

        Schema::defaultStringLength(191);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
