<?php

namespace App\Containers\DashboardSection\Manager\UI\WEB\Controllers;

use App\Containers\DashboardSection\Manager\Actions\FindManagerByIdAction;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\FindManagerByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindManagerByIdController extends WebController
{
    public function show(FindManagerByIdRequest $request)
    {
        $manager = app(FindManagerByIdAction::class)->run($request);
        // ..
    }
}
