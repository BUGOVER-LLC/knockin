<?php

namespace App\Containers\DashboardSection\Manager\Tasks;

use App\Containers\DashboardSection\Manager\Data\Repositories\ManagerRepository;
use App\Containers\DashboardSection\Manager\Models\Manager;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateManagerTask extends ParentTask
{
    public function __construct(
        protected ManagerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Manager
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
