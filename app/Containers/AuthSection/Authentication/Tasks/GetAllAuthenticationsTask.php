<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Authentication\Data\Repositories\AuthenticationRepository;
use Ship\Parents\Tasks\Task as ParentTask;

class GetAllAuthenticationsTask extends ParentTask
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
