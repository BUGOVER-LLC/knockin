<?php

namespace App\Containers\DashboardSection\Manager\Data\Repositories;

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
