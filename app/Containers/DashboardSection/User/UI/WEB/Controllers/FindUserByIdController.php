<?php

namespace Containers\DashboardSection\User\UI\WEB\Controllers;

use Containers\DashboardSection\User\Actions\FindUserByIdAction;
use Containers\DashboardSection\User\UI\WEB\Requests\FindUserByIdRequest;
use Ship\Parents\Controllers\WebController;

class FindUserByIdController extends WebController
{
    public function show(FindUserByIdRequest $request)
    {
        $user = app(FindUserByIdAction::class)->run($request);
        // ..
    }
}
