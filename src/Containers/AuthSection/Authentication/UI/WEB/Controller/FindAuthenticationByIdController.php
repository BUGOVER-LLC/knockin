<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controller;

use Containers\AuthSection\Authentication\Action\FindAuthenticationByIdAction;
use Containers\AuthSection\Authentication\UI\WEB\Request\FindAuthenticationByIdRequest;
use Ship\Parent\Controller\WebController;

class FindAuthenticationByIdController extends WebController
{
    public function show(FindAuthenticationByIdRequest $request)
    {
        $authentication = app(FindAuthenticationByIdAction::class)->run($request);
        // ..
    }
}
