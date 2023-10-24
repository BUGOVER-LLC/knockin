<?php

declare(strict_types=1);

namespace App\Containers\Vendor\Repositories;

use App\Containers\DashboardSection\User\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @return Collection|array
     */
    public function getAllUsers(): Collection|array
    {
        return $this->createModelBuilder()->get();
    }
}
