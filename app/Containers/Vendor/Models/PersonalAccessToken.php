<?php

declare(strict_types=1);

namespace Containers\Vendor\Models;

use App\Containers\DashboardSection\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Containers\Vendor\Models\PersonalAccessToken
 *
 * @property-read User|null $tokenable
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken query()
 * @mixin \Eloquent
 */
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
