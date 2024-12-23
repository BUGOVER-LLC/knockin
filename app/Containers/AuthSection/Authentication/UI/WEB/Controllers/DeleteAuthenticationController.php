<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controllers;

use Containers\AuthSection\Authentication\Actions\DeleteAuthenticationAction;
use Containers\AuthSection\Authentication\UI\WEB\Requests\DeleteAuthenticationRequest;
use Ship\Parents\Controllers\WebController;

class DeleteAuthenticationController extends WebController
{
    public function destroy(DeleteAuthenticationRequest $request)
    {
         $result = app(DeleteAuthenticationAction::class)->run($request);
         // ..
    }
}
