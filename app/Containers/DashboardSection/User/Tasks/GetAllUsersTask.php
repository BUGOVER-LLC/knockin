<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DashboardSection\User\Data\Repositories\UserRepository;
use Ship\Parents\Tasks\Task as ParentTask;

class GetAllUsersTask extends ParentTask
{
    /**
     * @param UserRepository $repository
     */
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->addRequestCriteria()->repository->createModelBuilder()->paginate();
    }
}
