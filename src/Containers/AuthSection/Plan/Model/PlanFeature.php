<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ship\Parent\Model\Model;

final class PlanFeature extends Model
{
    protected $table = 'Plans';

    protected $primaryKey = 'planId';

    protected $fillable = [
        'planId',
        'planFeatureName',
        'planFeatureDescription',
    ];

    /**
     * @return BelongsTo
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'planId', 'planId');
    }
}
