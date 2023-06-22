<?php

namespace Containers\DashboardSection\Managing\UI\WEB\Controllers;

use Containers\DashboardSection\Managing\Actions\GetAllManagersAction;
use Containers\DashboardSection\Managing\UI\WEB\Requests\GetAllManagersRequest;
use App\Ship\Parents\Controllers\WebController;

class GetAllManagersController extends WebController
{
    public function index(GetAllManagersRequest $request)
    {
        $managers = app(GetAllManagersAction::class)->run($request);
        // ..
    }
}
