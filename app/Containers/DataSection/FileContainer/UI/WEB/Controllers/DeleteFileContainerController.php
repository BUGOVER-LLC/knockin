<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\WEB\Controllers;

use Containers\DataSection\FileContainer\Actions\DeleteFileContainerAction;
use Containers\DataSection\FileContainer\UI\WEB\Requests\DeleteFileContainerRequest;
use Ship\Parents\Controllers\WebController;

class DeleteFileContainerController extends WebController
{
    public function destroy(DeleteFileContainerRequest $request)
    {
         $result = app(DeleteFileContainerAction::class)->run($request);
         // ..
    }
}
