<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\API\Controllers;

use Containers\AuthSection\Oauth\Actions\DeleteOauthAction;
use Containers\AuthSection\Oauth\UI\API\Requests\DeleteOauthRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteOauthController extends ApiController
{
    /**
     * @param DeleteOauthRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteOauth(DeleteOauthRequest $request): JsonResponse
    {
        app(DeleteOauthAction::class)->run($request);

        return $this->noContent();
    }
}
