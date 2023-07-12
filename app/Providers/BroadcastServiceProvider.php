<?php

declare(strict_types=1);

namespace App\Providers;

use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
use Nucleus\Socket\Provider\ManagerProvider;
use Nucleus\Socket\RouterHandler;

class BroadcastServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(ManagerProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        WebSocketsRouter::webSocket('knock-manual-channel', RouterHandler::class);

        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
