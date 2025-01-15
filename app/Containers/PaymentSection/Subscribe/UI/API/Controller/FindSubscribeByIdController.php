<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\UI\API\Controller;

use Nucleus\Exceptions\InvalidResourceException;
use Containers\PaymentSection\Subscribe\Action\FindSubscribeByIdAction;
use Containers\PaymentSection\Subscribe\UI\API\Request\FindSubscribeByIdRequest;
use Containers\PaymentSection\Subscribe\UI\API\Resource\SubscribeResource;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;

class FindSubscribeByIdController extends ApiController
{
    /**
     * @throws InvalidResourceException|NotFoundException
     */
    public function findSubscribeById(FindSubscribeByIdRequest $request): array
    {
        $subscribe = app(FindSubscribeByIdAction::class)->run($request);

        return $this->transform($subscribe, SubscribeResource::class);
    }
}
