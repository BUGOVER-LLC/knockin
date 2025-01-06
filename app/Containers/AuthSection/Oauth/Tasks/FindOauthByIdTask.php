<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Tasks;

use Containers\AuthSection\Oauth\Data\Repositories\OauthRepository;
use Containers\AuthSection\Oauth\Models\Oauth;
use Ship\Exception\NotFoundException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Closure;

class FindOauthByIdTask extends ParentTask
{
    public function __construct(
        protected OauthRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function handle(mixed $id, ?Closure $next = null): Oauth
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
