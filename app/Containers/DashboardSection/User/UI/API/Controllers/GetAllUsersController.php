<?php

namespace Containers\DashboardSection\User\UI\API\Controllers;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DashboardSection\User\Actions\GetAllUsersAction;
use Containers\DashboardSection\User\UI\API\Requests\GetAllUsersRequest;
use Containers\DashboardSection\User\UI\API\Transformers\UserTransformer;
use Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllUsersController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllUsers(GetAllUsersRequest $request): array
    {
        $users = app(GetAllUsersAction::class)->run($request);

        return $this->transform($users, UserTransformer::class);
    }
}
