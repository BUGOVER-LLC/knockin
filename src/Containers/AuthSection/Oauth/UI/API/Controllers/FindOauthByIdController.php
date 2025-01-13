<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\API\Controllers;

use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Oauth\Actions\FindOauthByIdAction;
use Containers\AuthSection\Oauth\UI\API\Requests\FindOauthByIdRequest;
use Containers\AuthSection\Oauth\UI\API\Resource\OauthResource;
use Ship\Exception\NotFoundException;
use Ship\Parent\Controller\ApiController;

class FindOauthByIdController extends ApiController
{
    /**
     * @throws InvalidResourceException|NotFoundException
     */
    public function findOauthById(FindOauthByIdRequest $request): array
    {
        $oauth = app(FindOauthByIdAction::class)->run($request);

        return $this->transform($oauth, OauthResource::class);
    }
}
