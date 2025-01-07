<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\WEB\Controllers;

use Containers\DataSection\FileSystem\Actions\FindFileSystemByIdAction;
use Containers\DataSection\FileSystem\UI\WEB\Requests\FindFileSystemByIdRequest;
use Ship\Parent\Controller\WebController;

class FindFileSystemByIdController extends WebController
{
    public function show(FindFileSystemByIdRequest $request)
    {
        $filesystem = app(FindFileSystemByIdAction::class)->run($request);
        // ..
    }
}
