<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\WEB\Controllers;

use Containers\DataSection\FileSystem\Actions\GetAllFileSystemsAction;
use Containers\DataSection\FileSystem\UI\WEB\Requests\GetAllFileSystemsRequest;
use Ship\Parent\Controller\WebController;

class GetAllFileSystemsController extends WebController
{
    public function index(GetAllFileSystemsRequest $request)
    {
        $filesystems = app(GetAllFileSystemsAction::class)->run($request);
        // ..
    }
}
