<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\UI\WEB\Controllers;

use Containers\AuthSection\Auth\Actions\GetAllAuthsAction;
use Containers\AuthSection\Auth\UI\WEB\Requests\GetAllAuthsRequest;
use Ship\Parents\Controllers\WebController;

class GetAllAuthsController extends WebController
{
    public function index(GetAllAuthsRequest $request)
    {
        $auths = app(GetAllAuthsAction::class)->run($request);
        // ..
    }
}
