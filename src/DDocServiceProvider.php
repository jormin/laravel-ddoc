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
        // 发布视图文件
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ddoc');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-ddoc'),
        ]);
        // 发布资源文件
        $this->publishes([
            __DIR__.'/../public/' => public_path(''),
        ]);
        // 注册路由
        if ((method_exists($this->app, 'routesAreCached') && !$this->app->routesAreCached())
           || $this->isLumen()) {
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

    protected function isLumen()
    {
        return strpos($this->app->version(), 'Lumen') !== false;
    }
}
