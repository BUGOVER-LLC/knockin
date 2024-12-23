<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Tasks;

use Containers\DataSection\FileSystem\Data\Repositories\FileSystemRepository;
use Containers\DataSection\FileSystem\Models\FileSystem;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Closure;

class FindFileSystemByIdTask extends ParentTask
{
    public function __construct(
        protected FileSystemRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): FileSystem
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
