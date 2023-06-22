<?php

namespace App\Containers\DashboardSection\Manager\UI\WEB\Controllers;

use App\Containers\DashboardSection\Manager\Actions\CreateManagerAction;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\CreateManagerRequest;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\StoreManagerRequest;
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
