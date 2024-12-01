<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Tasks;

use Closure;
use Containers\AuthSection\Auth\Data\Repositories\AuthRepository;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateAuthTask extends ParentTask
{
    public function __construct(
        protected AuthRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function handle(mixed $context, ?Closure $next = null)
    {
    }
}
