<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\WEB\Controllers;

use Containers\DataSection\FileContainer\Actions\FindFileContainerByIdAction;
use Containers\DataSection\FileContainer\UI\WEB\Requests\FindFileContainerByIdRequest;
use Ship\Parents\Controllers\WebController;

class FindFileContainerByIdController extends WebController
{
    public function show(FindFileContainerByIdRequest $request)
    {
        $filecontainer = app(FindFileContainerByIdAction::class)->run($request);
        // ..
    }
}
