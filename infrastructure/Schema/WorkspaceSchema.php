<?php

declare(strict_types=1);

namespace Infrastructure\Schema;

use OpenApi\Attributes\Property;
use Src\Core\Abstracts\AbstractSchema;

class WorkspaceSchema extends AbstractSchema
{
    #[
        Property(property: 'id', type: 'string'),
        Property(property: 'name', type: 'string'),
    ]
    public function __construct(
        private readonly string $id,
        private readonly string $name,
    ) {
    }
}
