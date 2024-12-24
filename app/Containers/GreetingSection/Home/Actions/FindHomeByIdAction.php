<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Actions;

use Containers\GreetingSection\Home\Models\Home;
use Containers\GreetingSection\Home\Tasks\FindHomeByIdTask;
use Containers\GreetingSection\Home\UI\WEB\Requests\FindHomeByIdRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class FindHomeByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindHomeByIdRequest $request): Home
    {
        return app(FindHomeByIdTask::class)->run($request->id);
    }
}
