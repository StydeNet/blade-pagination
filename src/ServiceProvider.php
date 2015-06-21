<?php

namespace Styde\BladePagination;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{

    public function register()
    {
        AbstractPaginator::presenter(function ($paginator) {
            return new Presenter($paginator);
        });
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'blade-pagination');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'blade-pagination');

        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/blade-pagination'),
        ]);

        $this->publishes([
            __DIR__.'/../config.php' => config_path('blade-pagination.php'),
        ]);
    }

}