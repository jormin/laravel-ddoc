<?php

namespace Jormin\DDoc;

use Illuminate\Support\ServiceProvider;

class DDocServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布视图文件
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ddoc');
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-ddoc'),
        ]);

        // 发布资源文件
        $this->publishes([
            __DIR__.'/../public/' => public_path(''),
        ]);


        // 注册路由
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}