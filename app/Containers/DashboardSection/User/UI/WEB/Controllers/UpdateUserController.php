<?php

namespace Containers\DashboardSection\User\UI\WEB\Controllers;

use Containers\DashboardSection\User\Actions\FindUserByIdAction;
use Containers\DashboardSection\User\Actions\UpdateUserAction;
use Containers\DashboardSection\User\UI\WEB\Requests\EditUserRequest;
use Containers\DashboardSection\User\UI\WEB\Requests\UpdateUserRequest;
use Ship\Parents\Controllers\WebController;

class UpdateUserController extends WebController
{
    public function edit(EditUserRequest $request)
    {
        $user = app(FindUserByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateUserRequest $request)
    {
        $user = app(UpdateUserAction::class)->run($request);
        // ..
    }
}
