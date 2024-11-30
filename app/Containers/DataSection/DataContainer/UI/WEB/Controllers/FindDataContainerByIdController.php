<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\WEB\Controllers;

use Containers\DataSection\DataContainer\Actions\FindDataContainerByIdAction;
use Containers\DataSection\DataContainer\UI\WEB\Requests\FindDataContainerByIdRequest;
use Ship\Parents\Controllers\WebController;

class FindDataContainerByIdController extends WebController
{
    public function show(FindDataContainerByIdRequest $request)
    {
        $datacontainer = app(FindDataContainerByIdAction::class)->run($request);
        // ..
    }
}
