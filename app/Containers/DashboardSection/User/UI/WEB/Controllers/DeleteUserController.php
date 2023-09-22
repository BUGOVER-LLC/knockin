<?php

namespace Containers\DashboardSection\User\UI\WEB\Controllers;

use Containers\DashboardSection\User\Actions\DeleteUserAction;
use Containers\DashboardSection\User\UI\WEB\Requests\DeleteUserRequest;
use Ship\Parents\Controllers\WebController;

class DeleteUserController extends WebController
{
    public function destroy(DeleteUserRequest $request)
    {
         $result = app(DeleteUserAction::class)->run($request);
         // ..
    }
}
