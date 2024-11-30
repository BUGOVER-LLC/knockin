<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Actions;

use Containers\AuthSection\Auth\Models\Auth;
use Containers\AuthSection\Auth\Tasks\FindAuthByIdTask;
use Containers\AuthSection\Auth\UI\API\Requests\FindAuthByIdRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class FindAuthByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindAuthByIdRequest $request): Auth
    {
        return app(FindAuthByIdTask::class)->run($request->id);
    }
}
