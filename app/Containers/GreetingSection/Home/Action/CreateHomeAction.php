<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Action;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\GreetingSection\Home\Model\Home;
use Containers\GreetingSection\Home\Task\CreateHomeTask;
use Containers\GreetingSection\Home\UI\WEB\Request\CreateHomeRequest;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class CreateHomeAction extends ParentAction
{
    /**
     * @param CreateHomeRequest $request
     * @return Home
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateHomeRequest $request): Home
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateHomeTask::class)->run($data);
    }
}
