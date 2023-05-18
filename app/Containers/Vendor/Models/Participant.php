<?php

declare(strict_types=1);

namespace Containers\Vendor\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Service\Models\Entity\ServiceModel;

final class Participant extends ServiceModel
{
    protected $primaryKey = 'participant_id';

    protected $fillable = ['channel_id', 'user_id'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, 'channel_id', 'channel_id');
    }
}
