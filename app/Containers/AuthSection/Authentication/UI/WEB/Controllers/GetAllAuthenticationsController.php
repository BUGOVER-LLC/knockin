<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\WEB\Controllers;

use Containers\AuthSection\Authentication\Actions\GetAllAuthenticationsAction;
use Containers\AuthSection\Authentication\UI\WEB\Requests\GetAllAuthenticationsRequest;
use Ship\Parents\Controllers\WebController;

class GetAllAuthenticationsController extends WebController
{
    public function index(GetAllAuthenticationsRequest $request)
    {
        $authentications = app(GetAllAuthenticationsAction::class)->run($request);
        // ..
    }
}
