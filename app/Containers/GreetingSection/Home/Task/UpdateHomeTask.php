<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Task;

use Containers\GreetingSection\Home\Data\Repositories\HomeRepository;
use Containers\GreetingSection\Home\Model\Home;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class UpdateHomeTask extends ParentTask
{
    public function __construct(
        protected HomeRepository $repository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Home
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
