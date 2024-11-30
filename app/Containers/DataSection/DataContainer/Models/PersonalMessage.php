<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataContainer\Models;

use App\Containers\DashboardSection\User\Models\User;
use App\Containers\DataSection\DataContainer\Models\Workspace;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ship\Parents\Models\Model;

/**
 * Containers\Vendor\Models\PersonalMessage
 *
 * @property-read User|null $author
 * @property-read User|null $participant
 * @property-read \App\Containers\DataSection\DataContainer\Models\Workspace|null $workspace
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
    protected $primaryKey = 'personal_message_id';

    /**
     * @var string[]
     */
    protected $fillable = ['author_id', 'participant_id', 'workspace_id', 'parent_id', 'body', 'viewed', 'viewed_at'];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'participant_id');
    }

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspace_id', 'workspace_id');
    }
}
