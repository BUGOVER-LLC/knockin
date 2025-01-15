<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Task;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Plan\Data\Repository\PlanRepository;
use Ship\Parent\Task\Task as ParentTask;

class GetAllPlansTask extends ParentTask
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
