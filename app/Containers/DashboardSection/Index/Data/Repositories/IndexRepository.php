<?php

namespace Containers\DashboardSection\Index\Data\Repositories;

use Ship\Parents\Repositories\Repository as ParentRepository;

class IndexRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
