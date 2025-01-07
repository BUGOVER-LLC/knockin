<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Models;

use Ship\Parent\Model\Model as ParentModel;
use Nucleus\Attributes\ModelEntity;

#[ModelEntity()]
/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileSystem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileSystem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FileSystem query()
 * @mixin \Eloquent
 */
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
