<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Tasks;

use Containers\AuthSection\Auth\Data\Repositories\AuthRepository;
use Containers\AuthSection\Auth\Models\Auth;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindAuthByIdTask extends ParentTask
{
    public function __construct(
        protected AuthRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Auth
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
