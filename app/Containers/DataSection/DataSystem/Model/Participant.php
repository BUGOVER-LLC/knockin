<?php

declare(strict_types=1);

namespace Containers\DataSection\DataSystem\Model;

use Containers\AuthSection\Authentication\Domain\Model\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ship\Parent\Model\Model;

/**
 * Containers\Vendor\Models\Participant
 *
 * @property-read \Containers\DataSection\DataSystem\Models\Channel|null $channel
 * @property-read User|null $user
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Participant truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class Participant extends Model
{
    protected $primaryKey = 'participantId';

    protected $fillable = [
        'channelId',
        'userId',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }

    /**
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channelId', 'channelId');
    }
}
