<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controller;

use Containers\AuthSection\Authentication\Action\FindAuthenticationByIdAction;
use Containers\AuthSection\Authentication\Action\UpdateAuthenticationAction;
use Containers\AuthSection\Authentication\UI\WEB\Request\EditAuthenticationRequest;
use Containers\AuthSection\Authentication\UI\WEB\Request\UpdateAuthenticationRequest;
use Ship\Parent\Controller\WebController;

class UpdateAuthenticationController extends WebController
{
    public function edit(EditAuthenticationRequest $request)
    {
        $authentication = app(FindAuthenticationByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateAuthenticationRequest $request)
    {
        $authentication = app(UpdateAuthenticationAction::class)->run($request);
        // ..
    }
}
