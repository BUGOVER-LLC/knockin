<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataContainer\Models;

use App\Containers\DataSection\DataContainer\Models\BoardStape;
use App\Containers\DataSection\DataContainer\Models\BoardTask;
use App\Containers\DataSection\DataContainer\Models\SharedBoard;
use App\Containers\DataSection\DataContainer\Models\Workspace;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Ship\Parents\Models\Model;

/**
 * Containers\Vendor\Models\Board
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Containers\DataSection\DataContainer\Models\SharedBoard> $shared
 * @property-read int|null $shared_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Containers\DataSection\DataContainer\Models\BoardStape> $stapes
 * @property-read int|null $stapes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Containers\DataSection\DataContainer\Models\BoardTask> $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Containers\DataSection\DataContainer\Models\Workspace|null $workspace
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Board truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class Board extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'boardId';

    /**
     * @var string[]
     */
    protected $fillable = ['workspaceId', 'title'];

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspaceId', 'workspaceId');
    }

    /**
     * @return HasMany
     */
    public function shared(): HasMany
    {
        return $this->hasMany(SharedBoard::class, 'boardId', 'boardId');
    }

    /**
     * @return HasMany
     */
    public function stapes(): HasMany
    {
        return $this->hasMany(BoardStape::class, 'boardId', 'boardId');
    }

    /**@TODO FIX THIS RELATION
     * @return HasManyThrough
     */
    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(BoardTask::class, BoardStape::class, 'boardId', 'boardId');
    }
}
