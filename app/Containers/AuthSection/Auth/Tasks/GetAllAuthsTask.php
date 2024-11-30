<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Auth\Data\Repositories\AuthRepository;
use Ship\Parents\Tasks\Task as ParentTask;

class GetAllAuthsTask extends ParentTask
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
