<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataContainer\Models;

use App\Containers\DashboardSection\User\Models\User;
use App\Containers\DataSection\DataContainer\Models\Channel;
use App\Containers\DataSection\DataContainer\Models\Workspace;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ship\Parents\Models\Model;

/**
 * Containers\Vendor\Models\Message
 *
 * @property-read User|null $author
 * @property-read \App\Containers\DataSection\DataContainer\Models\Channel|null $channel
 * @property-read \App\Containers\DataSection\DataContainer\Models\Workspace|null $workspace
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Message truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class Message extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'message_id';
    /**
     * @var string[]
     */
    protected $fillable = ['author_id', 'channel_id', 'workspace_id', 'parent_id', 'body'];

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
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'channel_id');
    }

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspace_id', 'workspace_id');
    }
}
