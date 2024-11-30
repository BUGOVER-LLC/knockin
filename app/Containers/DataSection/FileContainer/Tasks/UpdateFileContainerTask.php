<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Tasks;

use Containers\DataSection\FileContainer\Data\Repositories\FileContainerRepository;
use Containers\DataSection\FileContainer\Models\FileContainer;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateFileContainerTask extends ParentTask
{
    public function __construct(
        protected FileContainerRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): FileContainer
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
