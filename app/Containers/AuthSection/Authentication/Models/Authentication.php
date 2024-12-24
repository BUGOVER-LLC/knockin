<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Models;

use Containers\AuthSection\Authentication\Data\Repositories\AuthenticationRepository;
use Ship\Parents\Models\Model as ParentModel;
use Nucleus\Attributes\ModelEntity;

#[ModelEntity(repositoryClass: AuthenticationRepository::class)]
/**
 * 
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Authentication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Authentication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Authentication query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Authentication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Authentication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Authentication whereUpdatedAt($value)
 * @mixin \Eloquent
 */
final class Authentication extends ParentModel
{
    protected $fillable = [];

    protected $hidden = [];

    protected $casts = [];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Authentication';
}
