<?php

declare(strict_types=1);

namespace Src\Core\Abstract;

use Illuminate\Foundation\Auth\User as EloquentAuthenticatableModel;

abstract class AbstractAuthModel extends EloquentAuthenticatableModel
{
    protected $connection = 'pgsql_app';
}
