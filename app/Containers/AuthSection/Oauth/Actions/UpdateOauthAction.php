<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Oauth\Models\Oauth;
use Containers\AuthSection\Oauth\Tasks\UpdateOauthTask;
use Containers\AuthSection\Oauth\UI\API\Requests\UpdateOauthRequest;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class UpdateOauthAction extends ParentAction
{
    /**
     * @param UpdateOauthRequest $request
     * @return Oauth
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateOauthRequest $request): Oauth
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateOauthTask::class)->run($data, $request->id);
    }
}
