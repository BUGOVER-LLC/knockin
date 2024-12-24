<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\GreetingSection\Home\Models\Home;
use Containers\GreetingSection\Home\Tasks\CreateHomeTask;
use Containers\GreetingSection\Home\UI\WEB\Requests\CreateHomeRequest;
use Ship\Exceptions\CreateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

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
