<?php

declare(strict_types=1);

namespace App\Containers\DataSection\DataContainer\Data\Repositories;

use App\Containers\DataSection\DataContainer\Models\User;
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
