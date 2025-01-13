<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\UI\API\Controller;

use Containers\PaymentSection\Subscribe\Action\DeleteSubscribeAction;
use Containers\PaymentSection\Subscribe\UI\API\Request\DeleteSubscribeRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteSubscribeController extends ApiController
{
    /**
     * @param DeleteSubscribeRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteSubscribe(DeleteSubscribeRequest $request): JsonResponse
    {
        app(DeleteSubscribeAction::class)->run($request);

        return $this->noContent();
    }
}
