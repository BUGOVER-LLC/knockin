<?php

declare(strict_types=1);

namespace Src\Providers;

use Illuminate\Redis\RedisServiceProvider;
use Illuminate\Support\Arr;
use Src\Redis\RedisManager;

/**
 *
 */
class RedisProvider extends RedisServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('redis', function ($app) {
            $config = $app->make('config')->get('database.redis', []);

            return new RedisManager($app, Arr::pull($config, 'client', 'phpredis'), $config);
        });

        $this->app->bind('redis.connection', function ($app) {
            return $app['redis']->connection();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['redis', 'redis.connection'];
    }
}
