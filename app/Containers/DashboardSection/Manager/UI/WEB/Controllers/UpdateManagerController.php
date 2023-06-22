<?php

namespace App\Containers\DashboardSection\Manager\UI\WEB\Controllers;

use App\Containers\DashboardSection\Manager\Actions\FindManagerByIdAction;
use App\Containers\DashboardSection\Manager\Actions\UpdateManagerAction;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\EditManagerRequest;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\UpdateManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateManagerController extends WebController
{
    public function edit(EditManagerRequest $request)
    {
        $manager = app(FindManagerByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateManagerRequest $request)
    {
        $manager = app(UpdateManagerAction::class)->run($request);
        // ..
    }
}
