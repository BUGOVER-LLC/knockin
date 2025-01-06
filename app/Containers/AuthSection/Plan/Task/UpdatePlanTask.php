<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Task;

use Containers\AuthSection\Plan\Data\Repository\PlanRepository;
use Containers\AuthSection\Plan\Model\Plan;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class UpdatePlanTask extends ParentTask
{
    public function __construct(
        protected PlanRepository $repository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Plan
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
