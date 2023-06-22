<?php

namespace Containers\DashboardSection\Managing\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ManagerRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
