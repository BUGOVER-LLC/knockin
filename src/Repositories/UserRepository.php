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

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return $this->createModelBuilder()
            ->where('email', '=', $email)
            ->first();
    }

    public function store(array $attrs)
    {
        $this->createModelBuilder()->create($attrs);
    }
}
