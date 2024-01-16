<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\Models;

use Ship\Parents\Models\Model as ParentModel;

class UserDevices extends ParentModel
{
    protected $fillable = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'UserDevices';
}
