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
        if($this->app['config']->get('laravel-ddoc.pdf.enabled')){
            $this->app->singleton('laravel-ddoc.pdf', function($app) {
                $binary = $app['config']->get('laravel-ddoc.pdf.binary', '/usr/local/bin/wkhtmltopdf-amd64');
                $options = $app['config']->get('laravel-ddoc.pdf.options', array());
                $env = $app['config']->get('laravel-ddoc.pdf.env', array());
                $timeout = $app['config']->get('laravel-ddoc.pdf.timeout', false);
                $snappy = new IlluminateSnappyPdf($app['files'], $binary, $options, $env);
                if (false !== $timeout) {
                    $snappy->setTimeout($timeout);
                }
                return $snappy;
            });

            $this->app->singleton('laravel-ddoc.pdf.wrapper', function($app) {
                return new PdfWrapper($app['laravel-ddoc.pdf']);
            });
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