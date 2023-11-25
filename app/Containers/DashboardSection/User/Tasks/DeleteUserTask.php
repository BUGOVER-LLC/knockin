<?php

namespace Containers\DashboardSection\User\Tasks;

use Containers\DashboardSection\User\Data\Repositories\UserRepository;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteUserTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): int
    {
        try {
            return $this->repository->createModelBuilder()->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
