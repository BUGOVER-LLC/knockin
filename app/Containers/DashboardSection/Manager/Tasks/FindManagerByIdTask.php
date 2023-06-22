<?php

namespace App\Containers\DashboardSection\Manager\Tasks;

use App\Containers\DashboardSection\Manager\Data\Repositories\ManagerRepository;
use App\Containers\DashboardSection\Manager\Models\Manager;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindManagerByIdTask extends ParentTask
{
    public function __construct(
        protected ManagerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Manager
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
