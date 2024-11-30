<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\WEB\Controllers;

use Containers\DataSection\DataContainer\Actions\CreateDataContainerAction;
use Containers\DataSection\DataContainer\UI\WEB\Requests\CreateDataContainerRequest;
use Containers\DataSection\DataContainer\UI\WEB\Requests\StoreDataContainerRequest;
use Ship\Parents\Controllers\WebController;

class CreateDataContainerController extends WebController
{
    public function create(CreateDataContainerRequest $request)
    {
        // ..
    }

    public function store(StoreDataContainerRequest $request)
    {
        $datacontainer = app(CreateDataContainerAction::class)->run($request);
        // ..
    }
}
