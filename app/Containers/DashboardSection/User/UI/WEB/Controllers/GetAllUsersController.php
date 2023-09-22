<?php

namespace Containers\DashboardSection\User\UI\WEB\Controllers;

use Containers\DashboardSection\User\Actions\GetAllUsersAction;
use Containers\DashboardSection\User\UI\WEB\Requests\GetAllUsersRequest;
use Ship\Parents\Controllers\WebController;

class GetAllUsersController extends WebController
{
    public function index(GetAllUsersRequest $request)
    {
        $users = app(GetAllUsersAction::class)->run($request);
        // ..
    }
}
