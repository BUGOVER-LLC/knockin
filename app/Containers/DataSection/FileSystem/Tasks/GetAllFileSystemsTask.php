<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DataSection\FileSystem\Data\Repositories\FileSystemRepository;
use Ship\Parent\Task\Task as ParentTask;

class GetAllFileSystemsTask extends ParentTask
{
    public function __construct() {
    }

    /**
     *
     */
    public function handle(): mixed
    {
    }
}
