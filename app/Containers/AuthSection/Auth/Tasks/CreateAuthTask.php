<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Tasks;

use Containers\AuthSection\Auth\Data\Repositories\AuthRepository;
use Containers\AuthSection\Auth\Models\Auth;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateAuthTask extends ParentTask
{
    public function __construct(
        protected AuthRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Auth
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
