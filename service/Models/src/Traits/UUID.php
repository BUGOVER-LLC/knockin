<?php

declare(strict_types=1);

namespace Service\Models\Traits;

use Illuminate\Support\Str;

trait UUID
{
    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        /**
         * Listen for the creating event on the user model.
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
         */
        static::creating(static function ($model) {
            if (null === $model->uid) {
                $model->setAttribute($model->uid, Str::uuid()->toString());
            }
        });
    }
}
