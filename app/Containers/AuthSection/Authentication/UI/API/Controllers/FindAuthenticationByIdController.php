<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Controllers;

use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Authentication\Actions\FindAuthenticationByIdAction;
use Containers\AuthSection\Authentication\UI\API\Requests\FindAuthenticationByIdRequest;
use Containers\AuthSection\Authentication\UI\API\Resource\AuthenticationResource;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;

class FindAuthenticationByIdController extends ApiController
{
    /**
     * @throws InvalidResourceException|NotFoundException
     */
    public function findAuthenticationById(FindAuthenticationByIdRequest $request): array
    {
        $authentication = app(FindAuthenticationByIdAction::class)->run($request);

        return $this->transform($authentication, AuthenticationResource::class);
    }
}
