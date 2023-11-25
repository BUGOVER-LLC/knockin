<?php

namespace Containers\DashboardSection\User\UI\API\Controllers;

use Containers\DashboardSection\User\Actions\DeleteUserAction;
use Containers\DashboardSection\User\UI\API\Requests\DeleteUserRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteUserController extends ApiController
{
    /**
     * @param DeleteUserRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteUser(DeleteUserRequest $request): JsonResponse
    {
        app(DeleteUserAction::class)->run($request);

        return $this->noContent();
    }
}
