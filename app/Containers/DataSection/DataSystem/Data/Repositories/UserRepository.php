<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataSystem\Data\Repositories;

use App\Containers\DataSection\DataSystem\Models\User;
use Illuminate\Contracts\Container\Container;
use Ship\Parents\Repositories\Repository;

class UserRepository extends Repository
{
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(User::class);
    }
}
