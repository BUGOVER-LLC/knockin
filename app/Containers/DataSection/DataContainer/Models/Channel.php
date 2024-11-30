<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataContainer\Models;

use App\Containers\DashboardSection\User\Models\User;
use App\Containers\DataSection\DataContainer\Models\BoardTask;
use App\Containers\DataSection\DataContainer\Models\Participant;
use App\Containers\DataSection\DataContainer\Models\SharedBoard;
use App\Containers\DataSection\DataContainer\Models\SharedChannel;
use App\Containers\DataSection\DataContainer\Models\Workspace;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ship\Parents\Models\Model;

/**
 * Containers\Vendor\Models\Channel
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Containers\DataSection\DataContainer\Models\SharedBoard> $boards
 * @property-read int|null $boards_count
 * @property-read User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $participant
 * @property-read int|null $participant_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Containers\DataSection\DataContainer\Models\SharedChannel> $shared
 * @property-read int|null $shared_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Containers\DataSection\DataContainer\Models\SharedBoard> $tBoards
 * @property-read int|null $t_boards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Containers\DataSection\DataContainer\Models\BoardTask> $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Containers\DataSection\DataContainer\Models\Workspace|null $workspace
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Channel truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class Channel extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'channel_id';
    /**
     * @var string[]
     */
    protected $fillable = [
        'workspace_id',
        'creator_id',
        'uid',
        'name',
        'status',
        'total_connected',
    ];

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspace_id', 'workspace_id');
    }

    /**
     * @return HasMany
     */
    public function boards(): HasMany
    {
        return $this->hasMany(SharedBoard::class, 'workspace_id', 'workspace_id');
    }

    /**
     * @return HasMany
     */
    public function tBoards(): HasMany
    {
        return $this->hasMany(SharedBoard::class, 'target_id', 'workspace_id');
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function shared(): HasMany
    {
        return $this->hasMany(SharedChannel::class, 'channel_id', 'channel_id');
    }

    /**
     * @return BelongsToMany
     */
    public function participant(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Participant::class, 'user_id', 'channel_id');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(BoardTask::class, 'channel_id', 'channel_id');
    }
}
