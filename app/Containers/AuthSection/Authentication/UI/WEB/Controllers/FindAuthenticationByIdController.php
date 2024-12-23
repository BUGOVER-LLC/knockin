<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controllers;

use Containers\AuthSection\Authentication\Actions\FindAuthenticationByIdAction;
use Containers\AuthSection\Authentication\UI\WEB\Requests\FindAuthenticationByIdRequest;
use Ship\Parents\Controllers\WebController;

class FindAuthenticationByIdController extends WebController
{
    public function show(FindAuthenticationByIdRequest $request)
    {
        $authentication = app(FindAuthenticationByIdAction::class)->run($request);
        // ..
    }
}
