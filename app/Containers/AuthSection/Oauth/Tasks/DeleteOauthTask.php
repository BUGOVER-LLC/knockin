<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Tasks;

use Containers\AuthSection\Oauth\Data\Repositories\OauthRepository;
use Ship\Exception\DeleteResourceFailedException;
use Ship\Exception\NotFoundException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class DeleteOauthTask extends ParentTask
{
    public function __construct(
        protected OauthRepository $repository
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
