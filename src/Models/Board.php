<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Src\Core\Abstract\AbstractModel;
use Src\Core\Attribute\ModelEntity;
use Src\Repositories\BoardRepository;

/**
 * Src\Models\Board
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\SharedBoard> $shared
 * @property-read int|null $shared_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\BoardStape> $stapes
 * @property-read int|null $stapes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\BoardTask> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Src\Models\Workspace|null $workspace
 * @method static \Illuminate\Database\Eloquent\Builder|Board newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board query()
 * @mixin \Eloquent
 */
#[ModelEntity(repositoryClass: BoardRepository::class)]
class Board extends AbstractModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'board_id';

    /**
     * @var string[]
     */
    protected $fillable = ['workspace_id', 'title'];

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
    public function shared(): HasMany
    {
        return $this->hasMany(SharedBoard::class, 'board_id', 'board_id');
    }

    /**
     * @return HasMany
     */
    public function stapes(): HasMany
    {
        return $this->hasMany(BoardStape::class, 'board_id', 'board_id');
    }

    /**@TODO FIX THIS RELATION
     * @return HasManyThrough
     */
    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(BoardTask::class, BoardStape::class, 'board_id', 'board_id');
    }
}
