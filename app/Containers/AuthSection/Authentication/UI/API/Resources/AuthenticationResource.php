<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Resource;

use Containers\AuthSection\Authentication\Models\Authentication;
use Ship\Parents\Resources\Resource as ParentResource;

class AuthenticationResource extends ParentResource
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Authentication $authentication): array
    {
        $response = [
                        'object' => $authentication->getResourceKey(),
            'id' => $authentication->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $authentication->id,
            'created_at' => $authentication->created_at,
            'updated_at' => $authentication->updated_at,
            'readable_created_at' => $authentication->created_at->diffForHumans(),
            'readable_updated_at' => $authentication->updated_at->diffForHumans(),
            // 'deleted_at' => $authentication->deleted_at,
        ], $response);
    }
}
