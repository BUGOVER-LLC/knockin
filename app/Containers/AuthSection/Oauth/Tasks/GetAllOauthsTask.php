<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Tasks;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Oauth\Data\Repositories\OauthRepository;
use Ship\Parent\Task\Task as ParentTask;

class GetAllOauthsTask extends ParentTask
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
