<?php

namespace App\Providers;

use App\models\category;
use App\models\skill;
use App\models\page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories' , category::get());
        view()->share('skills' , skill::get());
        view()->share('pages' , page::get());

    }
}
