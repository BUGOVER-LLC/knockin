<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Tasks;

use Containers\AuthSection\Oauth\Data\Repositories\OauthRepository;
use Containers\AuthSection\Oauth\Models\Oauth;
use Ship\Exception\NotFoundException;
use Ship\Exception\UpdateResourceFailedException;
use Ship\Parent\Task\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class UpdateOauthTask extends ParentTask
{
    public function __construct(
        protected OauthRepository $repository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Oauth
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
