<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\AuthSection\Authentication\Tasks\GetAllAuthenticationsTask;
use Containers\AuthSection\Authentication\UI\API\Requests\GetAllAuthenticationsRequest;
use Ship\Parents\Actions\Action as ParentAction;

class GetAllAuthenticationsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllAuthenticationsRequest $request): mixed
    {
        return app(GetAllAuthenticationsTask::class)->run();
    }
}
