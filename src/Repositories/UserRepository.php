<?php

declare(strict_types=1);

namespace Src\Repositories;

use Src\Core\Abstracts\AbstractRepository;
use Src\Models\User;

class UserRepository extends AbstractRepository
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function findById()
    {
        $this->createModelBuilder();
    }
}
