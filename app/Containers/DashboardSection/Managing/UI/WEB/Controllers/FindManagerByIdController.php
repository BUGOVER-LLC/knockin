<?php

namespace Containers\DashboardSection\Managing\UI\WEB\Controllers;

use Containers\DashboardSection\Managing\Actions\FindManagerByIdAction;
use Containers\DashboardSection\Managing\UI\WEB\Requests\FindManagerByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindManagerByIdController extends WebController
{
    public function show(FindManagerByIdRequest $request)
    {
        $manager = app(FindManagerByIdAction::class)->run($request);
        // ..
    }
}
