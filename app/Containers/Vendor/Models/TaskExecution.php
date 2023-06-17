<?php

declare(strict_types=1);

namespace App\Containers\Vendor\Models;

use App\Containers\Vendor\Models\BoardTask;
use App\Containers\Vendor\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nucleus\Models\Entity\ServiceModel;

final class TaskExecution extends ServiceModel
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
