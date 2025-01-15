<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Action;

use Containers\PaymentSection\Webhook\Task\DeleteWebhookTask;
use Containers\PaymentSection\Webhook\UI\API\Request\DeleteWebhookRequest;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class DeleteWebhookAction extends ParentAction
{
    /**
     * @param DeleteWebhookRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteWebhookRequest $request): int
    {
        return app(DeleteWebhookTask::class)->run($request->id);
    }
}
