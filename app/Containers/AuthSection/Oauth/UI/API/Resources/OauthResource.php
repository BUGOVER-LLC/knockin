<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\UI\API\Resource;

use Containers\AuthSection\Oauth\Models\Oauth;
use Ship\Parent\Resource\Resource as ParentResource;

class OauthResource extends ParentResource
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Oauth $oauth): array
    {
        $response = [
                        'object' => $oauth->getResourceKey(),
            'id' => $oauth->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $oauth->id,
            'created_at' => $oauth->created_at,
            'updated_at' => $oauth->updated_at,
            'readable_created_at' => $oauth->created_at->diffForHumans(),
            'readable_updated_at' => $oauth->updated_at->diffForHumans(),
            // 'deleted_at' => $oauth->deleted_at,
        ], $response);
    }
}
