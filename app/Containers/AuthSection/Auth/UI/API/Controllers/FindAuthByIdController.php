<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\API\Controllers;

use Nucleus\Exceptions\InvalidTransformerException;
use Containers\AuthSection\Auth\Actions\FindAuthByIdAction;
use Containers\AuthSection\Auth\UI\API\Requests\FindAuthByIdRequest;
use Containers\AuthSection\Auth\UI\API\Transformers\AuthTransformer;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Controllers\ApiController;

class FindAuthByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function findAuthById(FindAuthByIdRequest $request): array
    {
        $auth = app(FindAuthByIdAction::class)->run($request);

        return $this->transform($auth, AuthTransformer::class);
    }
}
