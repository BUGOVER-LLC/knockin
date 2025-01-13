<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\WEB\Controllers;

use Containers\AuthSection\Oauth\Actions\FindOauthByIdAction;
use Containers\AuthSection\Oauth\UI\WEB\Requests\FindOauthByIdRequest;
use Ship\Parent\Controller\WebController;

class FindOauthByIdController extends WebController
{
    public function show(FindOauthByIdRequest $request)
    {
        $oauth = app(FindOauthByIdAction::class)->run($request);
        // ..
    }
}
