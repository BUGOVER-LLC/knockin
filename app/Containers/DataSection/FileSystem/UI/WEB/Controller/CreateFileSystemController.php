<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\WEB\Controller;

use Containers\DataSection\FileSystem\Actions\CreateFileSystemAction;
use Containers\DataSection\FileSystem\UI\WEB\Requests\CreateFileSystemRequest;
use Containers\DataSection\FileSystem\UI\WEB\Requests\StoreFileSystemRequest;
use Ship\Parent\Controller\WebController;

class CreateFileSystemController extends WebController
{
    public function create(CreateFileSystemRequest $request)
    {
        // ..
    }

    public function store(StoreFileSystemRequest $request)
    {
        $filesystem = app(CreateFileSystemAction::class)->run($request);
        // ..
    }
}
