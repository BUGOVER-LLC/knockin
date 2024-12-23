<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Controllers;

use Containers\AuthSection\Authentication\Actions\DeleteAuthenticationAction;
use Containers\AuthSection\Authentication\UI\API\Requests\DeleteAuthenticationRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;
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
