<?php

namespace Containers\DashboardSection\Managing\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Manager extends ParentModel
{
    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Manager';
}
