<?php

namespace Containers\DashboardSection\Managing\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DashboardSection\Managing\Data\Repositories\ManagerRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllManagersTask extends ParentTask
{
    public function __construct(
        protected ManagerRepository $repository
    )
    {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository->paginate();
    }
}
