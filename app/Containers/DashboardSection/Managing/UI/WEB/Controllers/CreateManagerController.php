<?php

namespace Containers\DashboardSection\Managing\UI\WEB\Controllers;

use Containers\DashboardSection\Managing\Actions\CreateManagerAction;
use Containers\DashboardSection\Managing\UI\WEB\Requests\CreateManagerRequest;
use Containers\DashboardSection\Managing\UI\WEB\Requests\StoreManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateManagerController extends WebController
{
    public function create(CreateManagerRequest $request)
    {
        // ..
    }

    public function store(StoreManagerRequest $request)
    {
        $manager = app(CreateManagerAction::class)->run($request);
        // ..
    }
}
