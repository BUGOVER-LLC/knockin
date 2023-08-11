<?php

namespace Containers\DashboardSection\Index\UI\API\Transformers;

use Containers\DashboardSection\Index\Models\Index;
use Ship\Parents\Transformers\Transformer as ParentTransformer;

class IndexTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Index $index): array
    {
        $response = [
            'object' => $index->getResourceKey(),
            'id' => $index->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $index->id,
            'created_at' => $index->created_at,
            'updated_at' => $index->updated_at,
            'readable_created_at' => $index->created_at->diffForHumans(),
            'readable_updated_at' => $index->updated_at->diffForHumans(),
            // 'deleted_at' => $index->deleted_at,
        ], $response);
    }
}
