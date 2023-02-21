<?php

declare(strict_types=1);

namespace App\Providers;

use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
use Service\Socket\Provider\ManagerProvider;
use Service\Socket\RouterHandler;

class BroadcastServiceProvider extends ServiceProvider
{
    public function register()
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
