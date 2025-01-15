<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Ship\Parent\Model\Model;

final class Plan extends Model
{
    protected $table = 'Plans';

    protected $primaryKey = 'planId';

    protected $fillable = [
        'planName',
        'planDescription',
        'planPrice',
        'trial',
    ];

    protected $casts = [
        'trial' => 'bool',
        'active' => 'bool',
    ];

    /**
     * @return HasMany
     */
    public function planFeatures(): HasMany
    {
        return $this->hasMany(PlanFeature::class, 'planId', 'planId');
    }
}
