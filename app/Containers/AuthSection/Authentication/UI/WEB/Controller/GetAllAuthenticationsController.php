<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controller;

use Containers\AuthSection\Authentication\Action\GetAllAuthenticationsAction;
use Containers\AuthSection\Authentication\UI\WEB\Request\GetAllAuthenticationsRequest;
use Ship\Parent\Controller\WebController;

class GetAllAuthenticationsController extends WebController
{
    public function index(GetAllAuthenticationsRequest $request)
    {
        $authentications = app(GetAllAuthenticationsAction::class)->run($request);
        // ..
    }
}
