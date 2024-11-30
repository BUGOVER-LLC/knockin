<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\WEB\Controllers;

use Containers\DataSection\DataContainer\Actions\DeleteDataContainerAction;
use Containers\DataSection\DataContainer\UI\WEB\Requests\DeleteDataContainerRequest;
use Ship\Parents\Controllers\WebController;

class DeleteDataContainerController extends WebController
{
    public function destroy(DeleteDataContainerRequest $request)
    {
         $result = app(DeleteDataContainerAction::class)->run($request);
         // ..
    }
}
