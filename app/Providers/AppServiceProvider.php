<?php

namespace App\Providers;

use App\Services\Coupon\CouponService;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Interfaces\Services\CouponServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CouponServiceInterface::class,
            CouponService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
