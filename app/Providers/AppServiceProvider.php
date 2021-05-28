<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("Marketplace")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("Marketplace")->setRelease("1.0.0");

        $categories = \App\Category::all(['name', 'slug']);
        //view()->share('categories', $categories);
        //view()->composer('*', function($view) use($categories){
        //    $view->with('categories', $categories);

        //});
        view()->composer('*', 'App\Http\Views\CategoryViewComposer@compose');
    
    }
}
