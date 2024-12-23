<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Tasks;

use Containers\AuthSection\Authentication\Data\Repositories\AuthenticationRepository;
use Containers\AuthSection\Authentication\Models\Authentication;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Closure;

class FindAuthenticationByIdTask extends ParentTask
{
    public function __construct(
        protected AuthenticationRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): Authentication
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
