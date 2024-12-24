<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Actions;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\GreetingSection\Home\Tasks\GetAllHomesTask;
use Containers\GreetingSection\Home\UI\WEB\Requests\GetAllHomesRequest;
use Ship\Parents\Actions\Action as ParentAction;

class GetAllHomesAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllHomesRequest $request): mixed
    {
        return app(GetAllHomesTask::class)->run();
    }
}
