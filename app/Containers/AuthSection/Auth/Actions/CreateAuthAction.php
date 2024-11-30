<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Auth\Models\Auth;
use Containers\AuthSection\Auth\Tasks\CreateAuthTask;
use Containers\AuthSection\Auth\UI\API\Requests\CreateAuthRequest;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class CreateAuthAction extends ParentAction
{
    /**
     * @param CreateAuthRequest $request
     * @return Auth
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateAuthRequest $request): Auth
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateAuthTask::class)->run($data);
    }
}
