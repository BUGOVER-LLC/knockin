<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Tasks;

use Containers\AuthSection\Oauth\Data\Repositories\OauthRepository;
use Containers\AuthSection\Oauth\Models\Oauth;
use Ship\Exception\CreateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Closure;

class CreateOauthTask extends ParentTask
{
    public function __construct(
        protected OauthRepository $repository
    )
    {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Oauth
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
