<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Tasks;

use Containers\DataSection\DataContainer\Data\Repositories\DataContainerRepository;
use Containers\DataSection\DataContainer\Models\DataContainer;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateDataContainerTask extends ParentTask
{
    public function __construct(
        protected DataContainerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): DataContainer
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
