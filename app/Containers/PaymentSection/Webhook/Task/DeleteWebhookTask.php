<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Task;

use Closure;
use Containers\PaymentSection\Webhook\Domain\Repository\WebhookRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Task\Task as ParentTask;

class DeleteWebhookTask extends ParentTask
{
    public function __construct(
        protected WebhookRepository $repository
    )
    {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): int
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
