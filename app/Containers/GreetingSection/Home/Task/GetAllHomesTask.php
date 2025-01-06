<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Task;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\GreetingSection\Home\Data\Repositories\HomeRepository;
use Ship\Parent\Task\Task as ParentTask;

class GetAllHomesTask extends ParentTask
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
