<?php

namespace Containers\DashboardSection\Managing\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Containers\DashboardSection\Managing\Actions\DeleteManagerAction;
use Containers\DashboardSection\Managing\UI\WEB\Requests\DeleteManagerRequest;

class DeleteManagerController extends WebController
{
    public function destroy(DeleteManagerRequest $request)
    {
        $result = app(DeleteManagerAction::class)->run($request);
        // ..
    }
}
