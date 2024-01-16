<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Data\Repositories;

use Containers\DashboardSection\User\Models\UserDevices;
use Ship\Parents\Repositories\Repository as ParentRepository;

class UserDevicesRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

    /**
     * @param UserDevices $model
     */
    public function __construct(private readonly UserDevices $model)
    {
        parent::__construct($this->model);
    }
}
