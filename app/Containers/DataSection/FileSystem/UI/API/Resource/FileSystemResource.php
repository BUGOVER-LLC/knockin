<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\UI\API\Resource;

use Containers\DataSection\FileSystem\Models\FileSystem;
use Illuminate\Http\Request;
use Nucleus\Abstracts\Schema\Schema;
use Ship\Parent\Resource\Resource as ParentResource;

class FileSystemResource extends ParentResource
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(FileSystem $filesystem): array
    {
        $response = [
                        'object' => $filesystem->getResourceKey(),
            'id' => $filesystem->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $filesystem->id,
            'created_at' => $filesystem->created_at,
            'updated_at' => $filesystem->updated_at,
            'readable_created_at' => $filesystem->created_at->diffForHumans(),
            'readable_updated_at' => $filesystem->updated_at->diffForHumans(),
            // 'deleted_at' => $filesystem->deleted_at,
        ], $response);
    }

    public function toSchema(Request $request): Schema|string
    {
        // TODO: Implement toSchema() method.
    }
}
