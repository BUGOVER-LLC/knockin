<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Actions;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\GreetingSection\Home\Models\Home;
use Containers\GreetingSection\Home\Tasks\UpdateHomeTask;
use Containers\GreetingSection\Home\UI\WEB\Requests\UpdateHomeRequest;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Actions\Action as ParentAction;

class UpdateHomeAction extends ParentAction
{
    /**
     * @param UpdateHomeRequest $request
     * @return Home
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateHomeRequest $request): Home
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateHomeTask::class)->run($data, $request->id);
    }
}
