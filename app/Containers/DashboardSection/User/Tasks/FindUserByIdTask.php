<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Tasks;

use Containers\DashboardSection\User\Models\User;
use Containers\DashboardSection\User\Data\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
    public function run($id): Builder|array|Collection|Model
    {
        try {
            return $this->repository->createModelBuilder()->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
