<?php

namespace Ship\Parents\Models;

use Nucleus\Abstracts\Models\UserModel as AbstractUserModel;
use Nucleus\Traits\CanOwnTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

abstract class UserModel extends AbstractUserModel
{
    use Notifiable;
    use HasApiTokens;
    use HasRoles;
    use CanOwnTrait;
}
