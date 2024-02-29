<?php

declare(strict_types=1);

namespace Src\Core\Abstracts;

use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class AbstractModel extends EloquentModel
{
    protected $connection = 'pgsql_app';
}
