<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Src\Core\Abstracts\AbstractModel;

class Board extends AbstractModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'board_id';

    /**
     * @var string[]
     */
    protected $fillable = ['workspace_id', 'title'];

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
    public function shared(): HasMany
    {
        return $this->hasMany(SharedBoard::class, 'board_id', 'board_id');
    }

    /**
     * @return HasMany
     */
    public function stapes(): HasMany
    {
        return $this->hasMany(BoardStape::class, 'board_id', 'board_id');
    }

    /**@TODO FIX THIS RELATION
     * @return HasManyThrough
     */
    public function tasks(): HasManyThrough
    {
        return $this->hasManyThrough(BoardTask::class, BoardStape::class, 'board_id', 'board_id');
    }
}
