<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Data\Repositories;

use Containers\DashboardSection\User\Models\UserDevices;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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

    /**
     * @param int $user_id
     * @param int $device_id
     * @param string $name
     * @param string $model
     * @return Builder|Model
     */
    public function createDeviceForUser(int $user_id, int $device_id, string $name, string $model): Model|Builder
    {
        return $this->createModelBuilder()->create(
            ['user_id' => $user_id, 'device_id' => $device_id, 'name' => $name, 'model' => $model]
        );
    }
}
