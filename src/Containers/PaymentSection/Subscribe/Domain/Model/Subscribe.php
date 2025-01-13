<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\Domain\Model;

use Nucleus\Attributes\ModelEntity;
use Ship\Parent\Model\Model as ParentModel;

#[ModelEntity()]
class Subscribe extends ParentModel
{
    protected $table = '';

    protected $primaryKey = '';

    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Subscribe';
}
