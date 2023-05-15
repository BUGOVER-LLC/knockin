<?php

declare(strict_types=1);

namespace NoixContainers\Vendor\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Service\Models\Entity\ServiceModel;
use Znck\Eloquent\Relations\BelongsToThrough;

final class BoardTask extends ServiceModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'board_task_id';

    /**
     * @var string[]
     */
    protected $fillable = ['stape_id', 'creator_id', 'channel_id', 'title', 'body', 'assigned'];

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
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'creator_id');
    }

    /**
     * @return BelongsTo
     */
    public function stape(): BelongsTo
    {
        return $this->belongsTo(BoardStape::class, 'board_stape_id', 'stape_id');
    }

    /**@TODO FIX THIS RELATION
     * @return BelongsToThrough
     */
    public function board(): BelongsToThrough
    {
        return $this->belongsToThrough(BoardStape::class, Board::class, 'board_id', 'board_id');
    }

    /**
     * @return BelongsToMany
     */
    public function executors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, TaskExecution::class, 'task_id', 'task_execution_id', 'user_id');
    }
}
