<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\API\Resource;

use Containers\AuthSection\Plan\Model\Plan;
use Ship\Parent\Resource\Resource as ParentResource;

class PlanResource extends ParentResource
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Plan $plan): array
    {
        $response = [
                        'object' => $plan->getResourceKey(),
            'id' => $plan->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $plan->id,
            'created_at' => $plan->created_at,
            'updated_at' => $plan->updated_at,
            'readable_created_at' => $plan->created_at->diffForHumans(),
            'readable_updated_at' => $plan->updated_at->diffForHumans(),
            // 'deleted_at' => $plan->deleted_at,
        ], $response);
    }
}
