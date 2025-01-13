<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Domain\ValueObject\User;

use Illuminate\Database\Eloquent\Model;
use Ship\Parent\Value\Value;

class Name extends Value
{
    #[\Override] public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        // TODO: Implement get() method.
    }

    #[\Override] public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        // TODO: Implement set() method.
    }
}
