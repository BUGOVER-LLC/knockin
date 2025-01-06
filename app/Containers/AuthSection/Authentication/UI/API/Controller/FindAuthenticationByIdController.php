<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Controller;

use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Authentication\Action\FindAuthenticationByIdAction;
use Containers\AuthSection\Authentication\UI\API\Request\FindAuthenticationByIdRequest;
use Containers\AuthSection\Authentication\UI\API\Resource\AuthenticationResource;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;

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
