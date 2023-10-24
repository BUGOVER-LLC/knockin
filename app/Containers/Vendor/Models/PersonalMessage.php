<?php

declare(strict_types=1);

namespace Containers\Vendor\Models;

use App\Containers\DashboardSection\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ship\Parents\Models\Model;

final class PersonalMessage extends Model
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
