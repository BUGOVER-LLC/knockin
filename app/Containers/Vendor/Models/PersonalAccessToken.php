<?php

declare(strict_types=1);

namespace Containers\Vendor\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class PersonalAccessToken extends \Laravel\Sanctum\PersonalAccessToken
{
    /**
     * Get the tokenable model that the access token belongs to.
     *
     * @return BelongsTo
     */
    public function tokenable(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
