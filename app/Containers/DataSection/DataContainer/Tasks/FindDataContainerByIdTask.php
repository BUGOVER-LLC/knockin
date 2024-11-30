<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Tasks;

use Containers\DataSection\DataContainer\Data\Repositories\DataContainerRepository;
use Containers\DataSection\DataContainer\Models\DataContainer;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindDataContainerByIdTask extends ParentTask
{
    public function __construct(
        protected DataContainerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): DataContainer
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
