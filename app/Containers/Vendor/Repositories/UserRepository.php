<?php

declare(strict_types=1);

namespace App\Containers\Vendor\Repositories;

use Containers\Vendor\Models\User;
use Ship\Parents\Repositories\Repository;

class UserRepository extends Repository
{
    /**
     * @param User $user
     */
    public function __construct(private readonly User $user)
    {
        parent::__construct($user);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return User
     */
    public function __call(string $name, array $arguments): User
    {
        return $this->user;
    }
}
