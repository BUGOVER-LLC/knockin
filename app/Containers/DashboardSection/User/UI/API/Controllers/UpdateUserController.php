<?php

namespace Containers\DashboardSection\User\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DashboardSection\User\Actions\UpdateUserAction;
use Containers\DashboardSection\User\UI\API\Requests\UpdateUserRequest;
use Containers\DashboardSection\User\UI\API\Transformers\UserTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Controllers\ApiController;

class UpdateUserController extends ApiController
{
    /**
     * @param UpdateUserRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateUser(UpdateUserRequest $request): array
    {
        $user = app(UpdateUserAction::class)->run($request);

        return $this->transform($user, UserTransformer::class);
    }
}
