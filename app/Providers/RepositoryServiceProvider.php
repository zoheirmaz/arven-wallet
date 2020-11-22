<?php

namespace App\Providers;

use App\Repositories as Repositories;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Repositories\CreditRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CreditRepositoryInterface::class,
            Repositories\CreditRepository::class
        );
    }
}
