<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Oauth\Actions\CreateOauthAction;
use Containers\AuthSection\Oauth\UI\API\Requests\CreateOauthRequest;
use Containers\AuthSection\Oauth\UI\API\Resource\OauthResource;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateOauthController extends ApiController
{
    /**
     * @param CreateOauthRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidResourceException
     * @throws IncorrectIdException
     */
     #[Route(path: '/', methods: ['POST'])]
     #[
         Post(
             path: '/',
             description: 'create',
             summary: '',
             tags: [''],
             responses: [
                 new Response(
                     response: 200,
                     description: 'Get to create',
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
    public function createOauth(CreateOauthRequest $request): JsonResponse
    {
        $oauth = app(CreateOauthAction::class)->run($request);

        return $this->created($this->transform($oauth, OauthResource::class));
    }
}
