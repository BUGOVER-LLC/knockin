<?php

declare(strict_types=1);

namespace Src\Core\Abstracts;

use Illuminate\Contracts\Support\Arrayable;

abstract class AbstractSchema implements Arrayable
{
    final public function toArray(): array
    {
        return collect(get_object_vars($this))->toArray();
    }
}
