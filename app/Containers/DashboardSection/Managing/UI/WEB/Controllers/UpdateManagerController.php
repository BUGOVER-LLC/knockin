<?php

namespace Containers\DashboardSection\Managing\UI\WEB\Controllers;

use Containers\DashboardSection\Managing\Actions\FindManagerByIdAction;
use Containers\DashboardSection\Managing\Actions\UpdateManagerAction;
use Containers\DashboardSection\Managing\UI\WEB\Requests\EditManagerRequest;
use Containers\DashboardSection\Managing\UI\WEB\Requests\UpdateManagerRequest;
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
