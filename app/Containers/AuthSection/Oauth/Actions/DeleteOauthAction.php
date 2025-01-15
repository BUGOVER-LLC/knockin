<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Actions;

use Containers\AuthSection\Oauth\Tasks\DeleteOauthTask;
use Containers\AuthSection\Oauth\UI\API\Requests\DeleteOauthRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class DeleteOauthAction extends ParentAction
{
    /**
     * @param DeleteOauthRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteOauthRequest $request): int
    {
        return app(DeleteOauthTask::class)->run($request->id);
    }
}
