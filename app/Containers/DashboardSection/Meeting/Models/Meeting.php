<?php

namespace App\Containers\DashboardSection\Meeting\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Meeting extends ParentModel
{
    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Meeting';
}
