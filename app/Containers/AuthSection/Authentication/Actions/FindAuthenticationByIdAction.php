<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Actions;

use Containers\AuthSection\Authentication\Models\Authentication;
use Containers\AuthSection\Authentication\Tasks\FindAuthenticationByIdTask;
use Containers\AuthSection\Authentication\UI\API\Requests\FindAuthenticationByIdRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class FindAuthenticationByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindAuthenticationByIdRequest $request): Authentication
    {
        return app(FindAuthenticationByIdTask::class)->run($request->id);
    }
}
