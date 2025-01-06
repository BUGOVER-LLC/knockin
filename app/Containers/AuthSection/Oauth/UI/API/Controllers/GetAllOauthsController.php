<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\API\Controllers;

use Nucleus\Exceptions\CoreInternalErrorException;
use Nucleus\Exceptions\InvalidResourceException;
use Containers\AuthSection\Oauth\Actions\GetAllOauthsAction;
use Containers\AuthSection\Oauth\UI\API\Requests\GetAllOauthsRequest;
use Containers\AuthSection\Oauth\UI\API\Resource\OauthResource;
use Ship\Parent\Controller\ApiController;

class GetAllOauthsController extends ApiController
{
    /**
     * @throws InvalidResourceException
     * @throws CoreInternalErrorException
     */
    public function getAllOauths(GetAllOauthsRequest $request): array
    {
        $oauths = app(GetAllOauthsAction::class)->run($request);

        return $this->transform($oauths, OauthResource::class);
    }
}
