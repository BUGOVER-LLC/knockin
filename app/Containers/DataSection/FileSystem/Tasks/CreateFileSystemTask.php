<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Tasks;

use Containers\DataSection\FileSystem\Data\Repositories\FileSystemRepository;
use Containers\DataSection\FileSystem\Models\FileSystem;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Closure;

class CreateFileSystemTask extends ParentTask
{
    public function __construct(
        protected FileSystemRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): FileSystem
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
