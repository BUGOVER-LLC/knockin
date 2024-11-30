<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\API\Controllers;

use Containers\AuthSection\Auth\Actions\DeleteAuthAction;
use Containers\AuthSection\Auth\UI\API\Requests\DeleteAuthRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteAuthController extends ApiController
{
    /**
     * @param DeleteAuthRequest $request
     * @return JsonResponse
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteAuth(DeleteAuthRequest $request): JsonResponse
    {
        app(DeleteAuthAction::class)->run($request);

        return $this->noContent();
    }
}
