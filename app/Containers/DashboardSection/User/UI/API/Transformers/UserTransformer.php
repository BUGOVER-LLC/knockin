<?php

declare(strict_types=1);

namespace Containers\DashboardSection\User\UI\API\Transformers;

use Containers\DashboardSection\User\Models\User;
use Ship\Parents\Transformers\Transformer as ParentTransformer;

class UserTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform($user, callable $callback, $default = null): array
    {
        $response = [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $user->id,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
            // 'deleted_at' => $user->deleted_at,
        ], $response);
    }
}
