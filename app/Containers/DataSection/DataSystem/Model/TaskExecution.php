<?php

declare(strict_types=1);

namespace Containers\DataSection\DataSystem\Model;

use Containers\AuthSection\Authentication\Model\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ship\Parent\Model\Model;

/**
 * Containers\Vendor\Models\TaskExecution
 *
 * @property-read User|null $executor
 * @property-read \Containers\DataSection\DataSystem\Models\BoardTask|null $task
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|TaskExecution truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|Model withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class TaskExecution extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'taskExecutionId';
    /**
     * @var string[]
     */
    protected $fillable = ['taskId', 'executorId'];

    /**
     * @return BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(BoardTask::class, 'boardTaskId', 'taskId');
    }

    /**
     * @return BelongsTo
     */
    public function executor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId', 'executorId');
    }
}
