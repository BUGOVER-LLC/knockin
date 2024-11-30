<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\UI\API\Transformers;

use Containers\DataSection\DataContainer\Models\DataContainer;
use Ship\Parents\Resources\Resource as ParentResource;

class DataContainerTransformer extends ParentResource
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(DataContainer $datacontainer): array
    {
        $response = [
            'object' => $datacontainer->getResourceKey(),
            'id' => $datacontainer->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $datacontainer->id,
            'created_at' => $datacontainer->created_at,
            'updated_at' => $datacontainer->updated_at,
            'readable_created_at' => $datacontainer->created_at->diffForHumans(),
            'readable_updated_at' => $datacontainer->updated_at->diffForHumans(),
            // 'deleted_at' => $datacontainer->deleted_at,
        ], $response);
    }
}
