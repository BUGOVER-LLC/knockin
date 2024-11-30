<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\WEB\Controllers;

use Containers\DataSection\FileContainer\Actions\CreateFileContainerAction;
use Containers\DataSection\FileContainer\UI\WEB\Requests\CreateFileContainerRequest;
use Containers\DataSection\FileContainer\UI\WEB\Requests\StoreFileContainerRequest;
use Ship\Parents\Controllers\WebController;

class CreateFileContainerController extends WebController
{
    public function create(CreateFileContainerRequest $request)
    {
        // ..
    }

    public function store(StoreFileContainerRequest $request)
    {
        $filecontainer = app(CreateFileContainerAction::class)->run($request);
        // ..
    }
}
