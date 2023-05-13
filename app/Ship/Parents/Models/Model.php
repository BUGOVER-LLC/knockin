<?php

namespace App\Ship\Parents\Models;

use Nucleus\Abstracts\Models\Model as AbstractModel;
use Nucleus\Traits\CanOwnTrait;

abstract class Model extends AbstractModel
{
    use CanOwnTrait;
}
