<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataContainer\Models;

use Containers\DataSection\DataContainer\Models\BoardStape;
use Containers\DataSection\DataContainer\Models\Channel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ship\Parents\Models\Model;
use Znck\Eloquent\Relations\BelongsToThrough;

/**
 * Containers\Vendor\Models\BoardTask
 *
 * @property-read \Containers\DataSection\DataContainer\Models\Channel|null $channel
 * @property-read User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $executors
 * @property-read int|null $executors_count
 * @property-read \Containers\DataSection\DataContainer\Models\BoardStape|null $stape
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardTask truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class BoardTask extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'boardTaskId';

    /**
     * @var string[]
     */
    protected $fillable = [
        'stapeId',
        'creatorId',
        'channelId',
        'title',
        'body',
        'assigned',
    ];

    /**
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channelId', 'channelId');
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'creatorId');
    }

    /**
     * @return BelongsTo
     */
    public function stape(): BelongsTo
    {
        return $this->belongsTo(BoardStape::class, 'boardStapeId', 'stapeId');
    }

    /**
* @TODO FIX THIS RELATION
     * @return BelongsToThrough
     */
    public function board(): BelongsToThrough
    {
        return $this->belongsToThrough(BoardStape::class, Board::class, 'boardId', 'boardId');
    }

    /**
     * @return BelongsToMany
     */
    public function executors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, TaskExecution::class, 'taskId', 'taskExecutionId', 'userId');
    }
}
