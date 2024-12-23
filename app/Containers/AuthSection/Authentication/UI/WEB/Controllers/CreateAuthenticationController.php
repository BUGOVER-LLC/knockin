<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controllers;

use Containers\AuthSection\Authentication\Actions\CreateAuthenticationAction;
use Containers\AuthSection\Authentication\UI\WEB\Requests\CreateAuthenticationRequest;
use Containers\AuthSection\Authentication\UI\WEB\Requests\StoreAuthenticationRequest;
use Ship\Parents\Controllers\WebController;

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
