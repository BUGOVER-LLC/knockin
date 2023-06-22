<?php

namespace App\Containers\DashboardSection\Manager\Tasks;

use App\Containers\DashboardSection\Manager\Data\Repositories\ManagerRepository;
use App\Containers\DashboardSection\Manager\Models\Manager;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateManagerTask extends ParentTask
{
    public function __construct(
        protected ManagerRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Manager
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
