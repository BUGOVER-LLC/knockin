<?php

namespace Ship\Parents\Providers;

use Nucleus\Abstracts\Providers\BroadcastServiceProvider as AbstractBroadcastServiceProvider;
use Illuminate\Support\Facades\Broadcast;

/**
 * Class BroadcastServiceProvider
 *
 * A.K.A. app/Providers/BroadcastServiceProvider.php
 */
abstract class BroadcastServiceProvider extends AbstractBroadcastServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require app_path('Ship/Broadcasts/channels.php');
    }
}
