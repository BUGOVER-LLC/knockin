<?php

declare(strict_types=1);

namespace Src\Core\Trait;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;
use RuntimeException;

/**
 * Trait UUID
 *
 * @package Src\Core\Traits
 */
trait Uuid
{
    /**
     * The "booting" method of the model.
     *
     * @throws Exception
     */
    public static function boot(): void
    {
        parent::boot();

        static::creating(static function (Model $model): void {
            if ($model->attributesToArray()['uid'] ?? '') {
                $model->attributesToArray()['uid'] = $model->generateUuid();
            }
        });
    }

    /**
     * @return string
     */
    protected function generateUuid(): string
    {
        return match ($this->uuidVersion()) {
            1 => RamseyUuid::uuid1()->toString(),
            default => RamseyUuid::uuid4()->toString(),
        };

        throw new RuntimeException("UUID version [{$this->uuidVersion()}] not supported.");
    }

    /**
     * The UUID version to use.
     *
     * @return int
     */
    protected function uuidVersion(): int
    {
        return 4;
    }
}
