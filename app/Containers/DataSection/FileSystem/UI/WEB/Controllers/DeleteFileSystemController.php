<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\WEB\Controllers;

use Containers\DataSection\FileSystem\Actions\DeleteFileSystemAction;
use Containers\DataSection\FileSystem\UI\WEB\Requests\DeleteFileSystemRequest;
use Ship\Parents\Controllers\WebController;

class DeleteFileSystemController extends WebController
{
    public function destroy(DeleteFileSystemRequest $request)
    {
         $result = app(DeleteFileSystemAction::class)->run($request);
         // ..
    }
}
