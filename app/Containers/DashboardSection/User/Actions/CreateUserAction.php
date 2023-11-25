<?php

namespace Containers\DashboardSection\User\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DashboardSection\User\Models\User;
use Containers\DashboardSection\User\Tasks\CreateUserTask;
use Containers\DashboardSection\User\UI\API\Requests\CreateUserRequest;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class CreateUserAction extends ParentAction
{
    /**
     * @param CreateUserRequest $request
     * @return User
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateUserRequest $request): User
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateUserTask::class)->run($data);
    }
}
