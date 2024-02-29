<?php

declare(strict_types=1);

namespace Src\Core\Trait;

use Illuminate\Support\Collection;
use Src\Core\Abstract\AbstractSchema;

trait ConvertsSchemaToArray
{
    public static function schemas(array|Collection $collection): ?array
    {
        return collect($collection)->map(static fn($item) => static::schema($item))->toArray();
    }

    final public function toArray($request): array
    {
        return $this
            ->toSchema($request)
            ->toArray();
    }

    abstract public function toSchema($request): AbstractSchema;

    public static function schema($resource): ?AbstractSchema
    {
        return $resource ? (new static($resource))->toSchema(request()) : null;
    }

    public static function collection($resource)
    {
        return parent::collection($resource);
    }
}
