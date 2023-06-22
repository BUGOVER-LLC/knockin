<?php

namespace App\Containers\DashboardSection\Manager\UI\WEB\Controllers;

use App\Containers\DashboardSection\Manager\Actions\GetAllManagersAction;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\GetAllManagersRequest;
use App\Ship\Parents\Controllers\WebController;

class GetAllManagersController extends WebController
{
    public function index(GetAllManagersRequest $request)
    {
        $managers = app(GetAllManagersAction::class)->run($request);
        // ..
    }
}
