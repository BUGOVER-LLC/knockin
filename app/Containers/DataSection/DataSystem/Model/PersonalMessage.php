<?php

declare(strict_types=1);

namespace Containers\DataSection\DataSystem\Model;

use App\Containers\AuthSection\Authentication\Domain\Model\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ship\Parent\Model\Model;

/**
 * Containers\Vendor\Models\PersonalMessage
 *
 * @property-read User|null $author
 * @property-read User|null $participant
 * @property-read \Containers\DataSection\DataSystem\Models\Workspace|null $workspace
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|PersonalMessage truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class PersonalMessage extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'personalMessageId';

    /**
     * @var string[]
     */
    protected $fillable = [
        'authorId',
        'participantId',
        'workspaceId',
        'parentId',
        'body',
        'viewed',
        'viewedAt',
    ];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'authorId');
    }

    /**
     * @return BelongsTo
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'participantId');
    }

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspaceId', 'workspaceId');
    }
}
