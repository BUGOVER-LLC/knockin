<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\WEB\Controllers;

use Containers\AuthSection\Auth\Actions\CreateAuthAction;
use Containers\AuthSection\Auth\UI\WEB\Requests\CreateAuthRequest;
use Containers\AuthSection\Auth\UI\WEB\Requests\StoreAuthRequest;
use Ship\Parents\Controllers\WebController;

class CreateAuthController extends WebController
{
    public function create(CreateAuthRequest $request)
    {
        // ..
    }

    public function store(StoreAuthRequest $request)
    {
        $auth = app(CreateAuthAction::class)->run($request);
        // ..
    }
}
