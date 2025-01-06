<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Controller;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Authentication\Action\GetAllAuthenticationsAction;
use Containers\AuthSection\Authentication\UI\API\Request\GetAllAuthenticationsRequest;
use Containers\AuthSection\Authentication\UI\API\Resource\AuthenticationResource;
use Ship\Parent\Controller\ApiController;

class GetAllAuthenticationsController extends ApiController
{
    /**
     * @throws InvalidResourceException
     * @throws CoreInternalErrorException
     */
    public function getAllAuthentications(GetAllAuthenticationsRequest $request): array
    {
        $authentications = app(GetAllAuthenticationsAction::class)->run($request);

        return $this->transform($authentications, AuthenticationResource::class);
    }
}
