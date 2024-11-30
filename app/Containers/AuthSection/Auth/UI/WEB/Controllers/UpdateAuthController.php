<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\WEB\Controllers;

use Containers\AuthSection\Auth\Actions\FindAuthByIdAction;
use Containers\AuthSection\Auth\Actions\UpdateAuthAction;
use Containers\AuthSection\Auth\UI\WEB\Requests\EditAuthRequest;
use Containers\AuthSection\Auth\UI\WEB\Requests\UpdateAuthRequest;
use Ship\Parents\Controllers\WebController;

class UpdateAuthController extends WebController
{
    public function edit(EditAuthRequest $request)
    {
        $auth = app(FindAuthByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateAuthRequest $request)
    {
        $auth = app(UpdateAuthAction::class)->run($request);
        // ..
    }
}
