<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DashboardSection\User\Actions\CreateUserAction;
use Containers\DashboardSection\User\UI\API\Requests\CreateUserRequest;
use Containers\DashboardSection\User\UI\API\Transformers\UserTransformer;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateUserController extends ApiController
{
    /**
     * @param CreateUserRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createUser(CreateUserRequest $request): JsonResponse
    {
        $user = app(CreateUserAction::class)->run($request);

        return $this->created($this->transform($user, UserTransformer::class));
    }
}
