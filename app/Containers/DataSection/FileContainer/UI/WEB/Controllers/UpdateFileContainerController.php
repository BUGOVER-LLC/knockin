<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\WEB\Controllers;

use Containers\DataSection\FileContainer\Actions\FindFileContainerByIdAction;
use Containers\DataSection\FileContainer\Actions\UpdateFileContainerAction;
use Containers\DataSection\FileContainer\UI\WEB\Requests\EditFileContainerRequest;
use Containers\DataSection\FileContainer\UI\WEB\Requests\UpdateFileContainerRequest;
use Ship\Parents\Controllers\WebController;

class UpdateFileContainerController extends WebController
{
    public function edit(EditFileContainerRequest $request)
    {
        $filecontainer = app(FindFileContainerByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateFileContainerRequest $request)
    {
        $filecontainer = app(UpdateFileContainerAction::class)->run($request);
        // ..
    }
}
