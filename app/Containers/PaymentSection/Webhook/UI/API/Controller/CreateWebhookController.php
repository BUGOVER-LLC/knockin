<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\UI\API\Controller;

use Containers\PaymentSection\Webhook\Action\CreateWebhookAction;
use Containers\PaymentSection\Webhook\UI\API\Request\CreateWebhookRequest;
use Containers\PaymentSection\Webhook\UI\API\Resource\WebhookResource;
use Illuminate\Http\JsonResponse;
use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidResourceException;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Controller\ApiController;
use Symfony\Component\Routing\Attribute\Route;

class CreateWebhookController extends ApiController
{
    /**
     * @param CreateWebhookRequest $request
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
    public function __invoke(CreateWebhookRequest $request): JsonResponse
    {
        $webhook = app(CreateWebhookAction::class)->run($request);

        return $this->created($this->transform($webhook, WebhookResource::class));
    }
}
