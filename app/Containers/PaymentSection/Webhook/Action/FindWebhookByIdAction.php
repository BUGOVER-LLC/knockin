<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Action;

use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Containers\PaymentSection\Webhook\Task\FindWebhookByIdTask;
use Containers\PaymentSection\Webhook\UI\API\Request\FindWebhookByIdRequest;
use Ship\Exception\NotFoundException;
use Ship\Parent\Action\Action as ParentAction;

class FindWebhookByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindWebhookByIdRequest $request): Webhook
    {
        return app(FindWebhookByIdTask::class)->run($request->id);
    }
}
