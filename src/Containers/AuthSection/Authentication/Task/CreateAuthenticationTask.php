<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Task;

use Containers\AuthSection\Authentication\Data\Repository\AuthenticationRepository;
use Containers\AuthSection\Authentication\Model\Authentication;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Closure;

class CreateAuthenticationTask extends ParentTask
{
    public function __construct(
        protected AuthenticationRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Authentication
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
