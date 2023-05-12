<?php

namespace App\Ship\Parents\Models;

use Nucleus\src\Abstracts\Models\Model as AbstractModel;
use Nucleus\Traits\CanOwnTrait;

abstract class Model extends AbstractModel
{
    use CanOwnTrait;
}
