<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\UI\API\Controller;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\PaymentSection\Subscribe\Action\GetAllSubscribesAction;
use Containers\PaymentSection\Subscribe\UI\API\Request\GetAllSubscribesRequest;
use Containers\PaymentSection\Subscribe\UI\API\Resource\SubscribeResource;
use Ship\Parent\Controller\ApiController;

class GetAllSubscribesController extends ApiController
{
    /**
     * @throws InvalidResourceException
     * @throws CoreInternalErrorException
     */
    public function getAllSubscribes(GetAllSubscribesRequest $request): array
    {
        $subscribes = app(GetAllSubscribesAction::class)->run($request);

        return $this->transform($subscribes, SubscribeResource::class);
    }
}
