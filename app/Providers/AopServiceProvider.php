<?php

namespace App\Providers;

use App\Aspects\LoggingAspect;
use App\Aspects\UseTransactionAspect;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;

/**
 * Class AopServiceProvider 註冊 Aop aspect 物件
 * 注意!! 由於 dynamic proxy，Controller 中宣告的 action 參數不能宣告為 build-in type
 * 例如 public function foo(string bar)，會導致 proxy controller 編譯出錯誤語法
 * @package App\Providers
 */
class AopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Logging
        $this->app->singleton(LoggingAspect::class, function(Application $app) {
            return new LoggingAspect($app->make(LoggerInterface::class));
        });

        // UseTransaction
        $this->app->singleton(UseTransactionAspect::class, function(Application $app) {
            return new UseTransactionAspect($app->make(LoggerInterface::class));
        });

        $this->app->tag([LoggingAspect::class, UseTransactionAspect::class], 'goaop.aspect');
    }
}
