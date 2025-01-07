<?php

declare(strict_types=1);

namespace Containers\DataSection\DataSystem\Model;

use App\Containers\AuthSection\Authentication\Domain\Model\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Ship\Parent\Model\Model;

/**
 * Containers\Vendor\Models\Workspace
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Containers\DataSection\DataSystem\Models\Channel> $boards
 * @property-read int|null $boards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Containers\DataSection\DataSystem\Models\Channel> $channels
 * @property-read int|null $channels_count
 * @property-read User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Containers\DataSection\DataSystem\Models\Board> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $workers
 * @property-read int|null $workers_count
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Workspace truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class Workspace extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'workspaceId';

    /**
     * @var string[]
     */
    protected $fillable = [
        'creatorId',
        'uid',
        'name',
    ];

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'creatorId');
    }

    /**
     * @return HasMany
     */
    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class, 'workspaceId', 'workspaceId');
    }

    /**
     * @return HasMany
     */
    public function boards(): HasMany
    {
        return $this->hasMany(Channel::class, 'workspaceId', 'workspaceId');
    }

    /**
     * @return BelongsToMany
     */
    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Worker::class, 'userId', 'workspaceId');
    }

    /**@TODO FIX THIS RELATION
     * @return HasManyThrough
     */
    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(Board::class, BoardTask::class);
    }
}
