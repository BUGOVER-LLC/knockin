<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\WEB\Controllers;

use Containers\DataSection\FileContainer\Actions\GetAllFileContainersAction;
use Containers\DataSection\FileContainer\UI\WEB\Requests\GetAllFileContainersRequest;
use Ship\Parents\Controllers\WebController;

class GetAllFileContainersController extends WebController
{
    public function index(GetAllFileContainersRequest $request)
    {
        $filecontainers = app(GetAllFileContainersAction::class)->run($request);
        // ..
    }
}
