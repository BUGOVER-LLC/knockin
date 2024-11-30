<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\API\Controllers;

use Nucleus\Exceptions\IncorrectIdException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\AuthSection\Auth\Actions\UpdateAuthAction;
use Containers\AuthSection\Auth\UI\API\Requests\UpdateAuthRequest;
use Containers\AuthSection\Auth\UI\API\Transformers\AuthTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Controllers\ApiController;

class UpdateAuthController extends ApiController
{
    /**
     * @param UpdateAuthRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function updateAuth(UpdateAuthRequest $request): array
    {
        $auth = app(UpdateAuthAction::class)->run($request);

        return $this->transform($auth, AuthTransformer::class);
    }
}
