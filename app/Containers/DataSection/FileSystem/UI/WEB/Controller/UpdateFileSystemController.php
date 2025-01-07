<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\WEB\Controllers;

use Containers\DataSection\FileSystem\Actions\FindFileSystemByIdAction;
use Containers\DataSection\FileSystem\Actions\UpdateFileSystemAction;
use Containers\DataSection\FileSystem\UI\WEB\Requests\EditFileSystemRequest;
use Containers\DataSection\FileSystem\UI\WEB\Requests\UpdateFileSystemRequest;
use Ship\Parent\Controller\WebController;

class UpdateFileSystemController extends WebController
{
    public function edit(EditFileSystemRequest $request)
    {
        $filesystem = app(FindFileSystemByIdAction::class)->run($request);
        // ..
    }

    public function update(UpdateFileSystemRequest $request)
    {
        $filesystem = app(UpdateFileSystemAction::class)->run($request);
        // ..
    }
}
