<?php

namespace App\Providers;

use App\Tag;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::share('tags',Tag::all());
    }

    



    public function register()
    {
        //
    }
}
