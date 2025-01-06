<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Task;

use Containers\GreetingSection\Home\Data\Repositories\HomeRepository;
use Containers\GreetingSection\Home\Model\Home;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Closure;

class CreateHomeTask extends ParentTask
{
    public function __construct(
        protected HomeRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Home
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
