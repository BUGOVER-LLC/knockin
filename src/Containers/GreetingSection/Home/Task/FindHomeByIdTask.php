<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Task;

use Containers\GreetingSection\Home\Data\Repositories\HomeRepository;
use Containers\GreetingSection\Home\Model\Home;
use Ship\Exception\NotFoundException;
use Ship\Parent\Task\Task as ParentTask;
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
