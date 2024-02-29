<?php

declare(strict_types=1);

namespace Infrastructure\Support\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static register()
 */
class Observe extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws RuntimeException
     */
    public static function getFacadeAccessor(): string
    {
        return 'GlobalObserver';
    }
}
