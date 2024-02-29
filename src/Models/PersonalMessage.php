<?php

declare(strict_types=1);

namespace Src\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Src\Core\Abstract\AbstractModel;

/**
 * Src\Models\PersonalMessage
 *
 * @property-read \Src\Models\User|null $author
 * @property-read \Src\Models\User|null $participant
 * @property-read \Src\Models\Workspace|null $workspace
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage query()
 * @mixin \Eloquent
 */
class PersonalMessage extends AbstractModel
{
    /**
     * @var string
     */
    protected $primaryKey = 'personal_message_id';

    /**
     * @var string[]
     */
    protected $fillable = ['author_id', 'participant_id', 'workspace_id', 'parent_id', 'body', 'viewed', 'viewed_at'];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'author_id');
    }

    /**
     * @return BelongsTo
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'participant_id');
    }

    /**
     * @return BelongsTo
     */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class, 'workspace_id', 'workspace_id');
    }
}
