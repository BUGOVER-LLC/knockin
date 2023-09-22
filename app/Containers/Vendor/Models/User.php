<?php

declare(strict_types=1);

namespace Containers\Vendor\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Ship\Parents\Models\UserModel;

final class User extends UserModel
{
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
