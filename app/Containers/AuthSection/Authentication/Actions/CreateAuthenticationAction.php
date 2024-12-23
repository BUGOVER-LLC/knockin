<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Authentication\Models\Authentication;
use Containers\AuthSection\Authentication\Tasks\CreateAuthenticationTask;
use Containers\AuthSection\Authentication\UI\API\Requests\CreateAuthenticationRequest;
use Ship\Parents\Actions\Action as ParentAction;

class CreateAuthenticationAction extends ParentAction
{
    /**
     * @param CreateAuthenticationRequest $request
     * @return Authentication
     * @throws IncorrectIdException
     */
    public function run(CreateAuthenticationRequest $request): Authentication
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateAuthenticationTask::class)->run($data);
    }
}
