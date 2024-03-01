<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Src\Core\Abstract\AbstractModel;
use Src\Core\Attribute\ModelEntity;
use Src\Repositories\WorkspaceRepository;

/**
 * Src\Models\Workspace
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\Channel> $boards
 * @property-read int|null $boards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\Channel> $channels
 * @property-read int|null $channels_count
 * @property-read \Src\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\Board> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\User> $workers
 * @property-read int|null $workers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace query()
 * @property int $workspace_id
 * @property int|null $creator_id
 * @property string|null $uid
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Src\Models\WorkspaceLogo|null $logo
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workspace whereWorkspaceId($value)
 * @mixin \Eloquent
 */
#[ModelEntity(repositoryClass: WorkspaceRepository::class)]
class Workspace extends AbstractModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'workspace_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'creator_id',
        'uid',
        'name',
    ];

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'creator_id');
    }

    /**
     * @return HasMany
     */
    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class, 'workspace_id', 'workspace_id');
    }

    /**
     * @return HasMany
     */
    public function boards(): HasMany
    {
        return $this->hasMany(Channel::class, 'workspace_id', 'workspace_id');
    }

    /**
     * @return BelongsToMany
     */
    public function workers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Worker::class, 'user_id', 'workspace_id');
    }

    /**
     * @return HasManyThrough
     */
    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(Board::class, BoardTask::class);
    }

    public function logo()
    {
        return $this->hasOne(WorkspaceLogo::class, 'workspace_id', 'workspace_id');
    }
}
