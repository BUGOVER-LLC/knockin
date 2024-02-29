<?php

declare(strict_types=1);

namespace Infrastructure\Http\Resource;

use Infrastructure\Schema\WorkspaceSchema;
use Src\Core\Abstract\AbstractResource;
use Src\Core\Abstract\AbstractSchema;
use Src\Core\Trait\ConvertsSchemaToArray;

class WorkspaceResource extends AbstractResource
{
    use ConvertsSchemaToArray;

    public function toSchema($request): AbstractSchema
    {
        return new WorkspaceSchema(
            $this->resource->uid,
            $this->resource->name,
        );
    }
}
