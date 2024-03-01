<?php

declare(strict_types=1);

namespace Infrastructure\Http\Resource;

use Infrastructure\Schema\AuthStateSchema;
use Src\Core\Abstract\AbstractResource;
use Src\Core\Abstract\AbstractSchema;
use Src\Core\Trait\ConvertsSchemaToArray;

class AuthStateResource extends AbstractResource
{
    use ConvertsSchemaToArray;

    public function toSchema($request): AbstractSchema
    {
        return new AuthStateSchema(
            $this->resource->email,
            $this->resource->code,
            $this->resource->step
        );
    }
}
