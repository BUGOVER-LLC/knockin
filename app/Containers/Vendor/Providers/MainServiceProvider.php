<?php

declare(strict_types=1);

namespace Containers\Vendor\Providers;

class MainServiceProvider extends \Ship\Parents\Providers\MainServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        $this->app->register(RedisProvider::class);
    }
}
