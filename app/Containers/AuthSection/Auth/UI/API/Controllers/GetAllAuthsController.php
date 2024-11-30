<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\API\Controllers;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidTransformerException;
use Containers\AuthSection\Auth\Actions\GetAllAuthsAction;
use Containers\AuthSection\Auth\UI\API\Requests\GetAllAuthsRequest;
use Containers\AuthSection\Auth\UI\API\Transformers\AuthTransformer;
use Ship\Parents\Controllers\ApiController;

class GetAllAuthsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     */
    public function getAllAuths(GetAllAuthsRequest $request): array
    {
        $auths = app(GetAllAuthsAction::class)->run($request);

        return $this->transform($auths, AuthTransformer::class);
    }
}
