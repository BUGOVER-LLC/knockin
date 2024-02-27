<?php

declare(strict_types=1);

namespace Src\Http\DTO;

use Src\Core\Abstracts\AbstractDTO;

class CheckAcceptCodeDTO extends AbstractDTO
{
    /**
     * @param int $acceptCode
     * @param string $email
     * @param string $authenticator
     */
    public function __construct(
        public readonly string $acceptCode,
        public readonly string $email,
        public readonly string $authenticator,
    )
    {
    }
}
