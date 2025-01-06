<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Task;

use Containers\AuthSection\Plan\Data\Repository\PlanRepository;
use Containers\AuthSection\Plan\Model\Plan;
use Ship\Exception\NotFoundException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Closure;

class FindPlanByIdTask extends ParentTask
{
    public function __construct(
        protected PlanRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): Plan
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
