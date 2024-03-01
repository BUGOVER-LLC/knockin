<?php

declare(strict_types=1);

namespace Infrastructure\Schema;

use Src\Core\Abstract\AbstractSchema;

class AuthStateSchema extends AbstractSchema
{
    /**
     * @param string $email
     * @param string $acceptCode
     * @param int $step
     */
    public function __construct(
        private readonly string $email,
        private readonly string $acceptCode,
        private readonly int $step,
    ) {
    }
}
