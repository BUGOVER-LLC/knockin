<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controller;

use Containers\AuthSection\Authentication\Action\DeleteAuthenticationAction;
use Containers\AuthSection\Authentication\UI\WEB\Request\DeleteAuthenticationRequest;
use Ship\Parent\Controller\WebController;

class DeleteAuthenticationController extends WebController
{
    public function destroy(DeleteAuthenticationRequest $request)
    {
         $result = app(DeleteAuthenticationAction::class)->run($request);
         // ..
    }
}
