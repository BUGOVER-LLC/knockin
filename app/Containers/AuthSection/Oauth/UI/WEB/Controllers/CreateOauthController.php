<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\WEB\Controllers;

use Containers\AuthSection\Oauth\Actions\CreateOauthAction;
use Containers\AuthSection\Oauth\UI\WEB\Requests\CreateOauthRequest;
use Containers\AuthSection\Oauth\UI\WEB\Requests\StoreOauthRequest;
use Ship\Parent\Controller\WebController;

class CreateOauthController extends WebController
{
    public function create(CreateOauthRequest $request)
    {
        // ..
    }

    public function store(StoreOauthRequest $request)
    {
        $oauth = app(CreateOauthAction::class)->run($request);
        // ..
    }
}
