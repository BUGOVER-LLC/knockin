<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Models;

use Ship\Parents\Models\Model as ParentModel;
use Nucleus\Attributes\ModelEntity;

#[ModelEntity()]
class FileSystem extends ParentModel
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
    protected string $resourceKey = 'FileSystem';
}
