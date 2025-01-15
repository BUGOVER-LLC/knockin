<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Action;

use Nucleus\Exceptions\CoreInternalErrorException;
use Containers\PaymentSection\Webhook\Task\GetAllWebhooksTask;
use Containers\PaymentSection\Webhook\UI\API\Request\GetAllWebhooksRequest;
use Ship\Parent\Action\Action as ParentAction;

class GetAllWebhooksAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     */
    public function run(GetAllWebhooksRequest $request): mixed
    {
        return app(GetAllWebhooksTask::class)->run();
    }
}
