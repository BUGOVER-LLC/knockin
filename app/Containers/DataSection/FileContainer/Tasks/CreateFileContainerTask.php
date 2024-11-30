<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Tasks;

use Containers\DataSection\FileContainer\Data\Repositories\FileContainerRepository;
use Containers\DataSection\FileContainer\Models\FileContainer;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateFileContainerTask extends ParentTask
{
    public function __construct(
        protected FileContainerRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): FileContainer
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
