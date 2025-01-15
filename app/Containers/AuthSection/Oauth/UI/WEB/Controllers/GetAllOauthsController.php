<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\WEB\Controllers;

use Containers\AuthSection\Oauth\Actions\GetAllOauthsAction;
use Containers\AuthSection\Oauth\UI\WEB\Requests\GetAllOauthsRequest;
use Ship\Parent\Controller\WebController;

class GetAllOauthsController extends WebController
{
    public function index(GetAllOauthsRequest $request)
    {
        $oauths = app(GetAllOauthsAction::class)->run($request);
        // ..
    }
}
