<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\WEB\Controllers;

use Containers\DataSection\DataContainer\Actions\GetAllDataContainersAction;
use Containers\DataSection\DataContainer\UI\WEB\Requests\GetAllDataContainersRequest;
use Ship\Parents\Controllers\WebController;

class GetAllDataContainersController extends WebController
{
    public function index(GetAllDataContainersRequest $request)
    {
        $datacontainers = app(GetAllDataContainersAction::class)->run($request);
        // ..
    }
}
