<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Tasks;

use Containers\AuthSection\Authentication\Data\Repositories\AuthenticationRepository;
use Containers\AuthSection\Authentication\Models\Authentication;
use Ship\Exceptions\NotFoundException;
use Ship\Exceptions\UpdateResourceFailedException;
use Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Closure;

class UpdateAuthenticationTask extends ParentTask
{
    public function __construct(
        protected AuthenticationRepository $repository
    )
    {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function handle(mixed $data, ?Closure $next = null): Authentication
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
