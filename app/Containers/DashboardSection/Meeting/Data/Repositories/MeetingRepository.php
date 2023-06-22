<?php

namespace App\Containers\DashboardSection\Meeting\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class MeetingRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
