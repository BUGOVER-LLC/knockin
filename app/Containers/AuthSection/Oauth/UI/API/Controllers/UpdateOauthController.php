<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Oauth\Actions\UpdateOauthAction;
use Containers\AuthSection\Oauth\UI\API\Requests\UpdateOauthRequest;
use Containers\AuthSection\Oauth\UI\API\Resource\OauthResource;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Put;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class UpdateOauthController extends ApiController
{
    /**
     * @param UpdateOauthRequest $request
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
    public function updateOauth(UpdateOauthRequest $request): array
    {
        $oauth = app(UpdateOauthAction::class)->run($request);

        return $this->transform($oauth, OauthResource::class);
    }
}
