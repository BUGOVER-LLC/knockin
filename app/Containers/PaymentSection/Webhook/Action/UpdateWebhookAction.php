<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Action;

use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Containers\PaymentSection\Webhook\Task\UpdateWebhookTask;
use Containers\PaymentSection\Webhook\UI\API\Request\UpdateWebhookRequest;
use Nucleus\Exceptions\IncorrectIdException;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Action\Action as ParentAction;

class UpdateWebhookAction extends ParentAction
{
    /**
     * @param UpdateWebhookRequest $request
     * @return Webhook
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateWebhookRequest $request): Webhook
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return app(UpdateWebhookTask::class)->run($data, $request->id);
    }
}
