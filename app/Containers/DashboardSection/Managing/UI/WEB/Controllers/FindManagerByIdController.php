<?php

namespace Containers\DashboardSection\Managing\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Containers\DashboardSection\Managing\Actions\FindManagerByIdAction;
use Containers\DashboardSection\Managing\UI\WEB\Requests\FindManagerByIdRequest;

class FindManagerByIdController extends WebController
{
    public function show(FindManagerByIdRequest $request)
    {
        $manager = app(FindManagerByIdAction::class)->run($request);
        // ..
    }
}
