<?php

namespace Jormin\DDoc;

use Barryvdh\Snappy\IlluminateSnappyPdf;
use Barryvdh\Snappy\PdfWrapper;
use Barryvdh\Snappy\ServiceProvider;

class DDocServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置文件
        $this->publishes([
            __DIR__.'/../config/laravel-ddoc.php' => config_path('laravel-ddoc.php'),
        ]);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ddoc');
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
        $this->app->register('Barryvdh\Snappy\ServiceProvider');
    }
}