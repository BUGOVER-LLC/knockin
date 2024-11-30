<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\WEB\Controllers;

use Containers\AuthSection\Auth\Actions\FindAuthByIdAction;
use Containers\AuthSection\Auth\UI\WEB\Requests\FindAuthByIdRequest;
use Ship\Parents\Controllers\WebController;

class FindAuthByIdController extends WebController
{
    public function show(FindAuthByIdRequest $request)
    {
        $auth = app(FindAuthByIdAction::class)->run($request);
        // ..
    }
}
