<?php

namespace Containers\DashboardSection\User\UI\API\Controllers;

use Nucleus\Exceptions\InvalidTransformerException;
use Containers\DashboardSection\User\Actions\FindUserByIdAction;
use Containers\DashboardSection\User\UI\API\Requests\FindUserByIdRequest;
use Containers\DashboardSection\User\UI\API\Transformers\UserTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;

class FindUserByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findUserById(FindUserByIdRequest $request): array
    {
        $user = app(FindUserByIdAction::class)->run($request);

        return $this->transform($user, UserTransformer::class);
    }
}
