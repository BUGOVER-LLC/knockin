<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Actions;

use Containers\AuthSection\Oauth\Models\Oauth;
use Containers\AuthSection\Oauth\Tasks\FindOauthByIdTask;
use Containers\AuthSection\Oauth\UI\API\Requests\FindOauthByIdRequest;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class FindOauthByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindOauthByIdRequest $request): Oauth
    {
        return app(FindOauthByIdTask::class)->run($request->id);
    }
}
