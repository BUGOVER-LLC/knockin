<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Src\Core\Abstract\AbstractModel;
use Src\Core\Attribute\ModelEntity;
use Src\Repositories\BoardRepository;

/**
 * Src\Models\BoardStape
 *
 * @property-read \Src\Models\Board|null $board
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\BoardTask> $tasks
 * @property-read int|null $tasks_count
 * @method static \Illuminate\Database\Eloquent\Builder|BoardStape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoardStape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoardStape query()
 * @mixin \Eloquent
 */
#[ModelEntity()]
class BoardStape extends AbstractModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'board_stape_id';

    /**
     * @var string[]
     */
    protected $fillable = ['board_id', 'name'];

    /**
     * @return BelongsTo
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class, 'board_id', 'board_id');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(BoardTask::class, 'board_task_id', 'strape_id');
    }
}
