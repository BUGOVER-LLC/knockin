<?php

declare(strict_types=1);

namespace Ship\Parent\Model;

use Nucleus\Abstracts\Model\AuthModel as AbstractModel;
use Nucleus\Traits\CanOwnTrait;

abstract class UserModel extends AbstractModel
{
    use CanOwnTrait;
}
