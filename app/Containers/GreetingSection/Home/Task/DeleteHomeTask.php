<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Task;

use Containers\GreetingSection\Home\Data\Repositories\HomeRepository;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class DeleteHomeTask extends ParentTask
{
    public function __construct(
        protected HomeRepository $repository
    )
    {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): int
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
