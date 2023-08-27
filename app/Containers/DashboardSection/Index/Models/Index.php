<?php

namespace Containers\DashboardSection\Index\Models;

use Ship\Parents\Models\Model as ParentModel;

class Index extends ParentModel
{
    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Index';
}
