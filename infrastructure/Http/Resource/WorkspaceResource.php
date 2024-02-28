<?php

declare(strict_types=1);

namespace Infrastructure\Http\Resource;

use Infrastructure\Schema\WorkspaceSchema;
use Src\Core\Abstracts\AbstractResource;
use Src\Core\Abstracts\AbstractSchema;
use Src\Core\Traits\ConvertsSchemaToArray;

class WorkspaceResource extends AbstractResource
{
    use ConvertsSchemaToArray;

    public function toSchema($request): AbstractSchema
    {
        return new WorkspaceSchema(

        );
    }
}
