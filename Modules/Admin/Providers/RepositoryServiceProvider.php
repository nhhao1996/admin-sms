<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\Province\ProvinceRepository;
use Modules\Admin\Repositories\Province\ProvinceRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ProvinceRepositoryInterface::class, ProvinceRepository::class);
    }
}
