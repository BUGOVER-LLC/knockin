<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\WEB\Controllers;

use Containers\DataSection\DataContainer\Actions\FindDataContainerByIdAction;
use Containers\DataSection\DataContainer\Actions\UpdateDataContainerAction;
use Containers\DataSection\DataContainer\UI\WEB\Requests\EditDataContainerRequest;
use Containers\DataSection\DataContainer\UI\WEB\Requests\UpdateDataContainerRequest;
use Ship\Parents\Controllers\WebController;

class UpdateDataContainerController extends WebController
{
    public function edit(EditDataContainerRequest $request)
    {
        $datacontainer = app(FindDataContainerByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateDataContainerRequest $request)
    {
        $datacontainer = app(UpdateDataContainerAction::class)->run($request);
        // ..
    }
}
