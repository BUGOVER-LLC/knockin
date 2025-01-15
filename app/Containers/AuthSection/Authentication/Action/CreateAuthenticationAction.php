<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Action;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Authentication\Model\Authentication;
use Containers\AuthSection\Authentication\Task\CreateAuthenticationTask;
use Containers\AuthSection\Authentication\UI\API\Request\CreateAuthenticationRequest;
use Ship\Parent\Action\Action as ParentAction;

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
