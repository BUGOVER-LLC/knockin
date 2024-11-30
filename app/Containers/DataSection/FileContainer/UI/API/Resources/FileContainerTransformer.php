<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\UI\API\Transformers;

use Containers\DataSection\FileContainer\Models\FileContainer;
use Ship\Parents\Resources\Resource as ParentResource;

class FileContainerTransformer extends ParentResource
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(FileContainer $filecontainer): array
    {
        $response = [
            'object' => $filecontainer->getResourceKey(),
            'id' => $filecontainer->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $filecontainer->id,
            'created_at' => $filecontainer->created_at,
            'updated_at' => $filecontainer->updated_at,
            'readable_created_at' => $filecontainer->created_at->diffForHumans(),
            'readable_updated_at' => $filecontainer->updated_at->diffForHumans(),
            // 'deleted_at' => $filecontainer->deleted_at,
        ], $response);
    }
}
