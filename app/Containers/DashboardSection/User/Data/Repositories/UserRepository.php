<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Data\Repositories;

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
}
