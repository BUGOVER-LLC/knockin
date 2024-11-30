<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\WEB\Controllers;

use Containers\AuthSection\Auth\Actions\DeleteAuthAction;
use Containers\AuthSection\Auth\UI\WEB\Requests\DeleteAuthRequest;
use Ship\Parents\Controllers\WebController;

class DeleteAuthController extends WebController
{
    public function destroy(DeleteAuthRequest $request)
    {
         $result = app(DeleteAuthAction::class)->run($request);
         // ..
    }
}
