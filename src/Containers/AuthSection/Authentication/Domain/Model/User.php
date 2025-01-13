<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Domain\Model;

use Laravel\Cashier\Billable;
use Ship\Parent\Model\UserModel;

final class User extends UserModel
{
    use Billable;
}
