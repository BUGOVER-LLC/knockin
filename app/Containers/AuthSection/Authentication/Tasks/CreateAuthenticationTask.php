<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Tasks;

use Containers\AuthSection\Authentication\Data\Repositories\AuthenticationRepository;
use Containers\AuthSection\Authentication\Models\Authentication;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
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
