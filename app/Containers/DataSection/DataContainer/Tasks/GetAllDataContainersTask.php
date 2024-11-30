<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\DataSection\DataContainer\Data\Repositories\DataContainerRepository;
use Ship\Parents\Tasks\Task as ParentTask;

class GetAllDataContainersTask extends ParentTask
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
