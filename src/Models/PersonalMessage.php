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
 * @property int $personal_message_id
 * @property int $author_id
 * @property int $participant_id
 * @property int $workspace_id
 * @property int|null $parent_id
 * @property mixed $body
 * @property bool $viewed
 * @property string|null $viewed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereParticipantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage wherePersonalMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereViewedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalMessage whereWorkspaceId($value)
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
