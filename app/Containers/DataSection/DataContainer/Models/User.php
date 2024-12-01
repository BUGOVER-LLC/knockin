<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataContainer\Models;

use App\Containers\DataSection\DataContainer\Data\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Nucleus\Attributes\ModelEntity;
use Ship\Parents\Models\UserModel;

/**
 * Src\Models\User
 *
 * @property int $user_id
 * @property int|null $current_workspace_id
 * @property int|null $current_device_id
 * @property string|null $uid
 * @property string|null $name
 * @property string|null $phone
 * @property string $email
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\Board> $boards
 * @property-read int|null $boards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\Channel> $channels
 * @property-read int|null $channels_count
 * @property-read \Src\Models\Workspace|null $currentWorkspace
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\BoardTask> $executeTasks
 * @property-read int|null $execute_tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\Channel> $participants
 * @property-read int|null $participants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\PersonalMessage> $personalMessages
 * @property-read int|null $personal_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\PersonalMessage> $personalParticipants
 * @property-read int|null $personal_participants_count
 * @property-read \Src\Models\UserProfile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Src\Models\BoardTask> $tasks
 * @property-read int|null $tasks_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentWorkspaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerifiedAt($value)
 * @mixin \Eloquent
 */
#[ModelEntity(repositoryClass: UserRepository::class)]
final class User extends UserModel
{
    protected $connection = 'pgsql_app';

    /**
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'uid',
        'verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function boards(): HasMany
    {
        return $this->hasMany(Board::class, 'creator_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class, 'user_id', 'creator_id');
    }

    /**
     * @return BelongsToMany
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Channel::class, Participant::class, 'channel_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function personalMessages(): HasMany
    {
        return $this->hasMany(PersonalMessage::class, 'author_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function personalParticipants(): HasMany
    {
        return $this->hasMany(PersonalMessage::class, 'participant_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(BoardTask::class, 'creator_id', 'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function executeTasks(): BelongsToMany
    {
        return $this->belongsToMany(BoardTask::class, TaskExecution::class, 'user_id', 'task_execution_id', 'task_id');
    }

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function currentWorkspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspace_id', 'current_workspace_id');
    }
}
