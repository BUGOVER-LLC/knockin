<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Tasks;

use Containers\AuthSection\Authentication\Data\Repositories\AuthenticationRepository;
use Ship\Exceptions\DeleteResourceFailedException;
use Ship\Exceptions\NotFoundException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class DeleteAuthenticationTask extends ParentTask
{
    public function __construct(
        protected AuthenticationRepository $repository
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
