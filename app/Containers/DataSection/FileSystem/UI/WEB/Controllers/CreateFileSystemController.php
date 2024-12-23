<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\WEB\Controllers;

use Containers\DataSection\FileSystem\Actions\CreateFileSystemAction;
use Containers\DataSection\FileSystem\UI\WEB\Requests\CreateFileSystemRequest;
use Containers\DataSection\FileSystem\UI\WEB\Requests\StoreFileSystemRequest;
use Ship\Parents\Controllers\WebController;

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
