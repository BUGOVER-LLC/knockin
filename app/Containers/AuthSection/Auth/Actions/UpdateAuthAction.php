<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Auth\Models\Auth;
use Containers\AuthSection\Auth\Tasks\UpdateAuthTask;
use Containers\AuthSection\Auth\UI\API\Requests\UpdateAuthRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class UpdateAuthAction extends ParentAction
{
    /**
     * @param UpdateAuthRequest $request
     * @return Auth
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateAuthRequest $request): Auth
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateAuthTask::class)->run($data, $request->id);
    }
}
