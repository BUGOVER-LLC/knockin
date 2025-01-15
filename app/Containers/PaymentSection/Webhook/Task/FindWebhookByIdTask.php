<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Task;

use Closure;
use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Containers\PaymentSection\Webhook\Domain\Repository\WebhookRepository;
use Exception;
use Ship\Exception\NotFoundException;
use Ship\Parent\Task\Task as ParentTask;

class FindWebhookByIdTask extends ParentTask
{
    public function __construct(
        protected WebhookRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): Webhook
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
