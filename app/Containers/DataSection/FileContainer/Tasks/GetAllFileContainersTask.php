<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DataSection\FileContainer\Data\Repositories\FileContainerRepository;
use Ship\Parents\Tasks\Task as ParentTask;

class GetAllFileContainersTask extends ParentTask
{
    public function __construct() {
    }

    /**
     *
     */
    public function run(): mixed
    {
    }
}
