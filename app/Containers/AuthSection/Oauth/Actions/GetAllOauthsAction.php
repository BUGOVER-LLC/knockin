<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Oauth\Tasks\GetAllOauthsTask;
use Containers\AuthSection\Oauth\UI\API\Requests\GetAllOauthsRequest;
use Ship\Parent\Action\Action as ParentAction;

class GetAllOauthsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllOauthsRequest $request): mixed
    {
        return app(GetAllOauthsTask::class)->run();
    }
}
