<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Controller;

use Containers\AuthSection\Authentication\Action\DeleteAuthenticationAction;
use Containers\AuthSection\Authentication\UI\API\Request\DeleteAuthenticationRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteAuthenticationController extends ApiController
{
    /**
     * @param DeleteAuthenticationRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteAuthentication(DeleteAuthenticationRequest $request): JsonResponse
    {
        app(DeleteAuthenticationAction::class)->run($request);

        return $this->noContent();
    }
}
