<?php

declare(strict_types=1);

namespace Containers\DashboardSection\Managing\Actions;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Containers\DashboardSection\Managing\Models\Manager;
use Containers\DashboardSection\Managing\Tasks\CreateManagerTask;
use Containers\DashboardSection\Managing\UI\WEB\Requests\CreateManagerRequest;
use Nucleus\Exceptions\IncorrectIdException;

class CreateManagerAction extends ParentAction
{
    /**
     * @param CreateManagerRequest $request
     * @return Manager
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateManagerRequest $request): Manager
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateManagerTask::class)->run($data);
    }
}
