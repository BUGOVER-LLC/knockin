<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Throwable;

abstract class Action extends Controller
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
