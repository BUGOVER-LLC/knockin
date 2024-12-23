<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Actions;

use Containers\AuthSection\Authentication\Tasks\DeleteAuthenticationTask;
use Containers\AuthSection\Authentication\UI\API\Requests\DeleteAuthenticationRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class DeleteAuthenticationAction extends ParentAction
{
    /**
     * @param DeleteAuthenticationRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteAuthenticationRequest $request): int
    {
        return app(DeleteAuthenticationTask::class)->run($request->id);
    }
}
