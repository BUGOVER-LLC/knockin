<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Tasks;

use Containers\DataSection\FileSystem\Data\Repositories\FileSystemRepository;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class DeleteFileSystemTask extends ParentTask
{
    public function __construct(
        protected FileSystemRepository $repository
    )
    {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): int
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
