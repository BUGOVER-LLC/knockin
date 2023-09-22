<?php

declare(strict_types=1);

namespace Ship\Parents\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Nucleus\Abstracts\Models\AuthModel as AbstractUserModel;
use Nucleus\Role\Traits\HasRoles;

abstract class UserModel extends AbstractUserModel
{
    use Notifiable;
    use HasApiTokens;
    use HasRoles;
    use Cachable;
}
