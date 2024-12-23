<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\AuthSection\Authentication\Models\Authentication;
use Containers\AuthSection\Authentication\Tasks\UpdateAuthenticationTask;
use Containers\AuthSection\Authentication\UI\API\Requests\UpdateAuthenticationRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class UpdateAuthenticationAction extends ParentAction
{
    /**
     * @param UpdateAuthenticationRequest $request
     * @return Authentication
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateAuthenticationRequest $request): Authentication
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateAuthenticationTask::class)->run($data, $request->id);
    }
}
