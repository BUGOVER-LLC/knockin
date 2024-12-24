<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\GreetingSection\Home\Data\Repositories\HomeRepository;
use Ship\Parents\Tasks\Task as ParentTask;

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
