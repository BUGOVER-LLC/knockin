<?php

namespace Containers\DashboardSection\User\Tasks;

use Containers\DashboardSection\User\Data\Repositories\UserRepository;
use Containers\DashboardSection\User\Models\User;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindUserByIdTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): User
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
