<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Tasks;

use App\Containers\DashboardSection\User\Models\User;
use Containers\DashboardSection\User\Data\Repositories\UserRepository;
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
            return $this->repository->createModelBuilder()->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
