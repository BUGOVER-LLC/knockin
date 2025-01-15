<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Domain\Model;

use Containers\PaymentSection\Webhook\Domain\Repository\WebhookRepository;
use Nucleus\Attributes\ModelEntity;
use Ship\Parent\Model\Model as ParentModel;

#[ModelEntity(repositoryClass: WebhookRepository::class)]
class Webhook extends ParentModel
{
    protected $table = '';

    protected $primaryKey = '';

    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Webhook';
}
