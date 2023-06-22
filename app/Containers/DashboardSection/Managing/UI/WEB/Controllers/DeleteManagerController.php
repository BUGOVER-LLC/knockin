<?php

namespace Containers\DashboardSection\Managing\UI\WEB\Controllers;

use Containers\DashboardSection\Managing\Actions\DeleteManagerAction;
use Containers\DashboardSection\Managing\UI\WEB\Requests\DeleteManagerRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteManagerController extends WebController
{
    public function destroy(DeleteManagerRequest $request)
    {
         $result = app(DeleteManagerAction::class)->run($request);
         // ..
    }
}
