<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\WEB\Controllers;

use Containers\AuthSection\Oauth\Actions\FindOauthByIdAction;
use Containers\AuthSection\Oauth\Actions\UpdateOauthAction;
use Containers\AuthSection\Oauth\UI\WEB\Requests\EditOauthRequest;
use Containers\AuthSection\Oauth\UI\WEB\Requests\UpdateOauthRequest;
use Ship\Parent\Controller\WebController;

class UpdateOauthController extends WebController
{
    public function edit(EditOauthRequest $request)
    {
        $oauth = app(FindOauthByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateOauthRequest $request)
    {
        $oauth = app(UpdateOauthAction::class)->run($request);
        // ..
    }
}
