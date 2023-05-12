<?php

declare(strict_types=1);

namespace App\NoixContainers\Vendor\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Service\Models\Entity\ServiceModel;

class Channel extends ServiceModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'channel_id';
    /**
     * @var string[]
     */
    protected $fillable = [
        'workspace_id',
        'creator_id',
        'uid',
        'name',
        'status',
        'total_connected',
    ];

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
    public function boards(): HasMany
    {
        return $this->hasMany(SharedBoard::class, 'workspace_id', 'workspace_id');
    }

    /**
     * @return HasMany
     */
    public function tBoards(): HasMany
    {
        return $this->hasMany(SharedBoard::class, 'target_id', 'workspace_id');
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'user_id');
    }

    /**
     * @return HasMany
     */
    public function shared(): HasMany
    {
        return $this->hasMany(SharedChannel::class, 'channel_id', 'channel_id');
    }

    /**
     * @return BelongsToMany
     */
    public function participant(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Participant::class, 'user_id', 'channel_id');
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(BoardTask::class, 'channel_id', 'channel_id');
    }
}
