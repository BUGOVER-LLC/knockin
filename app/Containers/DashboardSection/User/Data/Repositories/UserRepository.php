<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Data\Repositories;

use Containers\DashboardSection\User\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Ship\Parents\Repositories\Repository as ParentRepository;

class UserRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

    /**
     * @param User $user
     */
    public function __construct(private readonly User $user)
    {
        parent::__construct($this->user);
    }

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): User|null
    {
        return $this->createModelBuilder()->where('email', '=', $email)->first();
    }

    /**
     * @param string $email
     * @param $code
     * @return Builder|Model
     */
    public function createUserForAuthByCode(string $email, $code): Model|Builder
    {
        return $this->createModelBuilder()->create(
            ['email' => $email, 'password' => Hash::make($code), 'verified_at' => now()]
        );
    }
}
