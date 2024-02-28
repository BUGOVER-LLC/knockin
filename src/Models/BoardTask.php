<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Core\Abstracts\AbstractModel;
use Znck\Eloquent\Relations\BelongsToThrough;

/**
 * Src\Models\BoardTask
 *
 * @property-read \Src\Models\Channel|null $channel
 * @property-read \Src\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\User> $executors
 * @property-read int|null $executors_count
 * @property-read \Src\Models\BoardStape|null $stape
 * @method static \Illuminate\Database\Eloquent\Builder|BoardTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoardTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BoardTask query()
 * @mixin \Eloquent
 */
class BoardTask extends AbstractModel
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
