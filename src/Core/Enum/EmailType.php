<?php

declare(strict_types=1);

namespace Src\Core\Enum;

enum EmailType: string
{
    case acceptCodeEmail = 'acceptCode';
    case registeredEmail = 'registeredSuccessful';
}
