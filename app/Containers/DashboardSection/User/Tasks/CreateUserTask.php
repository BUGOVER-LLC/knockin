<?php

namespace Containers\DashboardSection\User\Tasks;

use Containers\DashboardSection\User\Data\Repositories\UserRepository;
use Containers\DashboardSection\User\Models\User;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateUserTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): User
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
