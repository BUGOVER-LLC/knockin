<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\WEB\Controllers;

use Containers\AuthSection\Oauth\Actions\DeleteOauthAction;
use Containers\AuthSection\Oauth\UI\WEB\Requests\DeleteOauthRequest;
use Ship\Parent\Controller\WebController;

class DeleteOauthController extends WebController
{
    public function destroy(DeleteOauthRequest $request)
    {
         $result = app(DeleteOauthAction::class)->run($request);
         // ..
    }
}
