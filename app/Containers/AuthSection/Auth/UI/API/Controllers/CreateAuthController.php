<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\AuthSection\Auth\Actions\CreateAuthAction;
use Containers\AuthSection\Auth\UI\API\Requests\CreateAuthRequest;
use Containers\AuthSection\Auth\UI\API\Transformers\AuthTransformer;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateAuthController extends ApiController
{
    /**
     * @param CreateAuthRequest $request
     * @return JsonResponse
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function createAuth(CreateAuthRequest $request): JsonResponse
    {
        $auth = app(CreateAuthAction::class)->run($request);

        return $this->created($this->transform($auth, AuthTransformer::class));
    }
}
