<?php

declare(strict_types=1);

namespace Src\Core\Attribute;

use Attribute;

#[Attribute]
class ModelEntity
{
    /**
     * @param string|null $repositoryClass
     * @param bool $readonly
     */
    public function __construct(
        public readonly string|null $repositoryClass = '',
        public readonly bool $readonly = false,
    ) {
    }
}
