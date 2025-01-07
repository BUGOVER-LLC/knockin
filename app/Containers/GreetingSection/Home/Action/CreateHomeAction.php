<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Action;

use Nucleus\Exceptions\IncorrectIdException;
use Containers\GreetingSection\Home\UI\WEB\Request\CreateHomeRequest;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class CreateHomeAction extends ParentAction
{
    /**
     * @param CreateHomeRequest $request
     * @return void
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateHomeRequest $request)
    {
    }
}
