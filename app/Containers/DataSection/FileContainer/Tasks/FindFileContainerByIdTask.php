<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Tasks;

use Containers\DataSection\FileContainer\Data\Repositories\FileContainerRepository;
use Containers\DataSection\FileContainer\Models\FileContainer;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindFileContainerByIdTask extends ParentTask
{
    public function __construct(
        protected FileContainerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): FileContainer
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
