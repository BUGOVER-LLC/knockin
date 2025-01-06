<?php

declare(strict_types=1);

namespace Containers\DataSection\DataSystem\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ship\Parent\Model\Model;

/**
 * Containers\Vendor\Models\BoardStape
 *
 * @property-read \Containers\DataSection\DataSystem\Models\Board|null $board
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Containers\DataSection\DataSystem\Models\BoardTask> $tasks
 * @property-read int|null $tasks_count
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|BoardStape truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class BoardStape extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'boardStapeId';

    /**
     * @var string[]
     */
    protected $fillable = [
        'boardId',
        'name',
    ];

    /**
     * @return BelongsTo
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class, 'boardId', 'boardId');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(BoardTask::class, 'boardTaskId', 'strapeId');
    }
}
