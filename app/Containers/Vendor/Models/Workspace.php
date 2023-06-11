<?php

declare(strict_types=1);

namespace App\Containers\Vendor\Models;

use App\Containers\Vendor\Models\Board;
use App\Containers\Vendor\Models\BoardTask;
use App\Containers\Vendor\Models\Channel;
use App\Containers\Vendor\Models\User;
use App\Containers\Vendor\Models\Worker;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Service\Models\Entity\ServiceModel;

final class Workspace extends ServiceModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'workspace_id';
    /**
     * @var string[]
     */
    protected $fillable = [
        'workspace_id',
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

    /**@TODO FIX THIS RELATION
     * @return HasManyThrough
     */
    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(Board::class, BoardTask::class);
    }
}
