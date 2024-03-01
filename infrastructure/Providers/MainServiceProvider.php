<?php

declare(strict_types=1);

namespace Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Infrastructure\Loader\AutoLoader;

class MainServiceProvider extends ServiceProvider
{
    use AutoLoader;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->runLoaderRegister();
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->runLoaderBoot();
    }
}
