<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Tasks;

use Containers\DataSection\FileSystem\Data\Repositories\FileSystemRepository;
use Containers\DataSection\FileSystem\Models\FileSystem;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class UpdateFileSystemTask extends ParentTask
{
    public function __construct(
        protected FileSystemRepository $repository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): FileSystem
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
