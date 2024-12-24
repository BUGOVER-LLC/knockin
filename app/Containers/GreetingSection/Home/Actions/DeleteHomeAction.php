<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Actions;

use Containers\GreetingSection\Home\Tasks\DeleteHomeTask;
use Containers\GreetingSection\Home\UI\WEB\Requests\DeleteHomeRequest;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Actions\Action as ParentAction;

class DeleteHomeAction extends ParentAction
{
    /**
     * @param DeleteHomeRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteHomeRequest $request): int
    {
        return app(DeleteHomeTask::class)->run($request->id);
    }
}
