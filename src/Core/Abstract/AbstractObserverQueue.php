<?php

declare(strict_types=1);

namespace Src\Core\Abstract;

use Illuminate\Contracts\Queue\ShouldQueue;

abstract class AbstractObserverQueue extends AbstractObserver implements ShouldQueue
{
    /**
     * @return string
     */
    final public function viaQueue(): string
    {
        return 'default';
    }
}
