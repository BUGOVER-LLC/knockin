<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\TaskExecution
 *
 * @property-read \Src\Models\User|null $executor
 * @property-read \Src\Models\BoardTask|null $task
 * @method static \Illuminate\Database\Eloquent\Builder|TaskExecution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskExecution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskExecution query()
 * @mixin \Eloquent
 */
class TaskExecution extends AbstractModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'task_execution_id';
    /**
     * @var string[]
     */
    protected $fillable = ['task_id', 'executor_id'];

    /**
     * @return BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(BoardTask::class, 'board_task_id', 'task_id');
    }

    /**
     * @return BelongsTo
     */
    public function executor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'executor_id');
    }
}
