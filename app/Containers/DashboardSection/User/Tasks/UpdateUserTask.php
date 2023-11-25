<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Tasks;

use Containers\DashboardSection\User\Data\Repositories\UserRepository;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateUserTask extends ParentTask
{
    public function __construct(
        protected UserRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): int
    {
        try {
            return $this->repository->createModelBuilder()->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
