<?php

declare(strict_types=1);

namespace Src\Core\Abstracts;

use Illuminate\Support\Facades\DB;
use Throwable;

abstract class AbstractAction extends AbstractController
{
    /**
     * @throws Throwable
     */
    public function transactionalRun(...$arguments)
    {
        return DB::transaction(static function () use ($arguments) {
            /** @noinspection PhpUndefinedMethodInspection */
            return static::run(...$arguments);
        });
    }
}
