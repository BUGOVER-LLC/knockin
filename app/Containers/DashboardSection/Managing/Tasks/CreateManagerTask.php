<?php

declare(strict_types=1);

namespace Containers\DashboardSection\Managing\Tasks;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Containers\DashboardSection\Managing\Data\Repositories\ManagerRepository;
use Containers\DashboardSection\Managing\Models\Manager;
use Exception;

class CreateManagerTask extends ParentTask
{
    public function __construct(
        protected ManagerRepository $repository
    )
    {
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
