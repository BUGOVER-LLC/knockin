<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Tasks;

use Containers\GreetingSection\Home\Data\Repositories\HomeRepository;
use Containers\GreetingSection\Home\Models\Home;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Closure;

class FindHomeByIdTask extends ParentTask
{
    public function __construct(
        protected HomeRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): Home
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
