<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Oauth\Models\Oauth;
use Containers\AuthSection\Oauth\Tasks\CreateOauthTask;
use Containers\AuthSection\Oauth\UI\API\Requests\CreateOauthRequest;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class CreateOauthAction extends ParentAction
{
    /**
     * @param CreateOauthRequest $request
     * @return Oauth
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateOauthRequest $request): Oauth
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateOauthTask::class)->run($data);
    }
}
