<?php

namespace App\Containers\DashboardSection\Manager\UI\WEB\Controllers;

use App\Containers\DashboardSection\Manager\Actions\DeleteManagerAction;
use App\Containers\DashboardSection\Manager\UI\WEB\Requests\DeleteManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteManagerController extends WebController
{
    public function destroy(DeleteManagerRequest $request)
    {
         $result = app(DeleteManagerAction::class)->run($request);
         // ..
    }
}
