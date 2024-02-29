<?php

declare(strict_types=1);

namespace Src\Http\DTO;

use Src\Core\Abstract\AbstractDTO;

class CheckEmailDTO extends AbstractDTO
{
    /**
     * @param string $email
     * @param string $authenticator
     */
    public function __construct(
        public readonly string $email,
        public readonly string $authenticator,
    )
    {
    }
}
