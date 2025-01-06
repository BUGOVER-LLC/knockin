<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Controller;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Authentication\Action\CreateAuthenticationAction;
use Containers\AuthSection\Authentication\UI\API\Request\CreateAuthenticationRequest;
use Containers\AuthSection\Authentication\UI\API\Resource\AuthenticationResource;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateAuthenticationController extends ApiController
{
    /**
     * @param CreateAuthenticationRequest $request
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
    public function __invoke(CreateAuthenticationRequest $request): JsonResponse
    {
        $authentication = app(CreateAuthenticationAction::class)->run($request);

        return $this->created($this->transform($authentication, AuthenticationResource::class));
    }
}
