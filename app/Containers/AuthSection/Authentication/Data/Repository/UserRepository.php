<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Data\Repository;

use Containers\AuthSection\Authentication\Model\User;
use Illuminate\Contracts\Container\Container;
use Ship\Parent\Repository\Repository;

class UserRepository extends Repository
{
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(User::class);
    }
}
