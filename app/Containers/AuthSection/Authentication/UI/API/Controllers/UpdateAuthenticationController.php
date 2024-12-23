<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Authentication\Actions\UpdateAuthenticationAction;
use Containers\AuthSection\Authentication\UI\API\Requests\UpdateAuthenticationRequest;
use Containers\AuthSection\Authentication\UI\API\Resource\AuthenticationResource;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Controllers\ApiController;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Put;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdateAuthenticationController extends ApiController
{
    /**
     * @param UpdateAuthenticationRequest $request
     * @return array
     * @throws InvalidResourceException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    #[Route(path: '/', methods: ['PUT'])]
    #[
         Put(
             path: '/',
             description: 'create',
             summary: '',
             tags: [''],
             responses: [
                 new Response(
                     response: 200,
                     description: 'Get to Update',
                     content: new JsonContent(properties: [
                         new Property(
                             property: '_payload',
                             type: 'Schema'
                         ),
                     ])
                 ),
             ]
         ),
    ]
    public function updateAuthentication(UpdateAuthenticationRequest $request): array
    {
        $authentication = app(UpdateAuthenticationAction::class)->run($request);

        return $this->transform($authentication, AuthenticationResource::class);
    }
}
