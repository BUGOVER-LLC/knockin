<?php

namespace Containers\DashboardSection\User\UI\WEB\Controllers;

use Containers\DashboardSection\User\Actions\CreateUserAction;
use Containers\DashboardSection\User\UI\WEB\Requests\CreateUserRequest;
use Containers\DashboardSection\User\UI\WEB\Requests\StoreUserRequest;
use Ship\Parents\Controllers\WebController;

class CreateUserController extends WebController
{
    public function create(CreateUserRequest $request)
    {
        // ..
    }

    public function store(StoreUserRequest $request)
    {
        $user = app(CreateUserAction::class)->run($request);
        // ..
    }
}
