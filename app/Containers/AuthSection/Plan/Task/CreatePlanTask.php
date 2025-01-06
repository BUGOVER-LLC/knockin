<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Task;

use Containers\AuthSection\Plan\Data\Repository\PlanRepository;
use Containers\AuthSection\Plan\Model\Plan;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Closure;

class CreatePlanTask extends ParentTask
{
    public function __construct(
        protected PlanRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Plan
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
