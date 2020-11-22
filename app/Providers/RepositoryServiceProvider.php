<?php

namespace App\Providers;

use App\Repositories as Repositories;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Repositories\CouponRepositoryInterface;
use Infrastructure\Repositories\CreditRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
}
