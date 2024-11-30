<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Tasks;

use Containers\DataSection\DataContainer\Data\Repositories\DataContainerRepository;
use Containers\DataSection\DataContainer\Models\DataContainer;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateDataContainerTask extends ParentTask
{
    public function __construct(
        protected DataContainerRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): DataContainer
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
