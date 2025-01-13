<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controller;

use Containers\AuthSection\Authentication\Action\CreateAuthenticationAction;
use Containers\AuthSection\Authentication\UI\WEB\Request\CreateAuthenticationRequest;
use Containers\AuthSection\Authentication\UI\WEB\Request\StoreAuthenticationRequest;
use Ship\Parent\Controller\WebController;

class CreateAuthenticationController extends WebController
{
    public function create(CreateAuthenticationRequest $request)
    {
        // ..
    }

    public function store(StoreAuthenticationRequest $request)
    {
        $authentication = app(CreateAuthenticationAction::class)->run($request);
        // ..
    }
}
