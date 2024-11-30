<?php

declare(strict_types=1);

namespace Containers\AuthSection\Auth\Data\Repositories;

use Ship\Parents\Repositories\Repository as AbstractRepository;
use Illuminate\Contracts\Container\Container;

class AuthRepository extends AbstractRepository
{
    /**
     * @param User $user
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(AuthRepository::class)
            ->setRepositoryId(AuthRepository::getTableName())
            ->setCacheDriver('redis');
    }
}
