<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Data\Repositories;

use App\Containers\DashboardSection\User\Models\User;
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
}
