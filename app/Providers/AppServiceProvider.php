<?php

declare(strict_types=1);

namespace App\Providers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\HorizonServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (app()->environment('local')) {
            $this->app->register(HorizonServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
            config('debugbar.enabled')
                ? [
                Debugbar::enable(),
                Debugbar::getJavascriptRenderer()->setAjaxHandlerAutoShow(2 >= config('app.strict_level')),
            ]
                : Debugbar::disable();
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->strictModeAdoption();
    }

    /**
     * Is determinate strict mode level for eloquent
     *
     * @return void
     */
    protected function strictModeAdoption(): void
    {
        $strict = (bool)config('app.strict');
        $level = (int)config('app.strict_level');

        if ($strict) {
            if (1 === $level) {
                Model::shouldBeStrict();
            } elseif (2 === $level) {
                Model::preventLazyLoading();
                Model::preventAccessingMissingAttributes();
                Model::preventSilentlyDiscardingAttributes(false);
            } elseif (3 === $level) {
                Model::preventSilentlyDiscardingAttributes(false);
            }
        }
    }
}
