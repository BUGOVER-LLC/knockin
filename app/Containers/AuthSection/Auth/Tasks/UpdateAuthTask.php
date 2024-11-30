<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Tasks;

use Containers\AuthSection\Auth\Data\Repositories\AuthRepository;
use Containers\AuthSection\Auth\Models\Auth;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAuthTask extends ParentTask
{
    public function __construct(
        protected AuthRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Auth
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
