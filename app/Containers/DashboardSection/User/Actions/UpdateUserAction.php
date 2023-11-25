<?php

namespace Containers\DashboardSection\User\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\DashboardSection\User\Models\User;
use Containers\DashboardSection\User\Tasks\UpdateUserTask;
use Containers\DashboardSection\User\UI\API\Requests\UpdateUserRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class UpdateUserAction extends ParentAction
{
    /**
     * @param UpdateUserRequest $request
     * @return User
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateUserRequest $request): User
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateUserTask::class)->run($data, $request->id);
    }
}
