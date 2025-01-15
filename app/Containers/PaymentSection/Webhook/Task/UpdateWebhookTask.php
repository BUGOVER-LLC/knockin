<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Task;

use Closure;
use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Containers\PaymentSection\Webhook\Domain\Repository\WebhookRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;

class UpdateWebhookTask extends ParentTask
{
    public function __construct(
        protected WebhookRepository $repository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Webhook
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
