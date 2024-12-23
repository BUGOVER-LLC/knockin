<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controllers;

use Containers\AuthSection\Authentication\Actions\FindAuthenticationByIdAction;
use Containers\AuthSection\Authentication\Actions\UpdateAuthenticationAction;
use Containers\AuthSection\Authentication\UI\WEB\Requests\EditAuthenticationRequest;
use Containers\AuthSection\Authentication\UI\WEB\Requests\UpdateAuthenticationRequest;
use Ship\Parents\Controllers\WebController;

class UpdateAuthenticationController extends WebController
{
    public function edit(EditAuthenticationRequest $request)
    {
        $authentication = app(FindAuthenticationByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateAuthenticationRequest $request)
    {
        $authentication = app(UpdateAuthenticationAction::class)->run($request);
        // ..
    }
}
