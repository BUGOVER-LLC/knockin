<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Task;

use Closure;
use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Containers\PaymentSection\Webhook\Domain\Repository\WebhookRepository;
use Exception;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;

class CreateWebhookTask extends ParentTask
{
    public function __construct(
        protected WebhookRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Webhook
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
