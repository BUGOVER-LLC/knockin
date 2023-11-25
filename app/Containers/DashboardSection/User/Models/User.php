<?php

declare(strict_types=1);

namespace App\Containers\DashboardSection\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Containers\Vendor\Models\Board;
use Containers\Vendor\Models\BoardTask;
use Containers\Vendor\Models\Channel;
use Containers\Vendor\Models\Participant;
use Containers\Vendor\Models\PersonalMessage;
use Containers\Vendor\Models\TaskExecution;
use Containers\Vendor\Models\Workspace;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ship\Parents\Models\UserModel;

/**
 * App\Containers\DashboardSection\User\Models\User
 *
 * @property string $uid
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Board> $boards
 * @property-read int|null $boards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Channel> $channels
 * @property-read int|null $channels_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read Workspace|null $currentWorkspace
 * @property-read \Illuminate\Database\Eloquent\Collection<int, BoardTask> $executeTasks
 * @property-read int|null $execute_tasks_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Channel> $participants
 * @property-read int|null $participants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, PersonalMessage> $personalMessages
 * @property-read int|null $personal_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, PersonalMessage> $personalParticipants
 * @property-read int|null $personal_participants_count
 * @property-read \App\Containers\DashboardSection\User\Models\UserProfile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, BoardTask> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User all($columns = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User avg($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User cache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User cachedValue(array $arguments, string $cacheKey)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User count($columns = '*')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserModel disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User disableModelCaching()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User exists()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User flushCache(array $tags = [])
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User getModelCacheCooldown(\Illuminate\Database\Eloquent\Model $instance)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User inRandomOrder($seed = '')
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User insert(array $values)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User isCachable()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User max($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User min($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User newQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserModel permission($permissions)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User query()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserModel role($roles, $guard = null)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User sum($column)
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|User truncate()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|UserModel withCacheCooldownSeconds(?int $seconds = null)
 * @mixin \Eloquent
 */
final class User extends UserModel
{
    /**
     * @var string
     */
    protected $connection = 'pgsql_app';

    /**
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * @var string
     */
    protected string $uniqeuKey = 'uid';

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
