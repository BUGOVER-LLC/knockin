<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Action;

use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Containers\PaymentSection\Webhook\Task\CreateWebhookTask;
use Containers\PaymentSection\Webhook\UI\API\Request\CreateWebhookRequest;
use Nucleus\Exceptions\IncorrectIdException;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class CreateWebhookAction extends ParentAction
{
    /**
     * @param CreateWebhookRequest $request
     * @return Webhook
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateWebhookRequest $request): Webhook
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(CreateWebhookTask::class)->run($data);
    }
}
