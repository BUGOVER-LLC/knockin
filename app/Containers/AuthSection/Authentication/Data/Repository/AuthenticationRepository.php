<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Data\Repository;

use Containers\AuthSection\Authentication\Model\Authentication;
use Ship\Parent\Repositories\Repository as AbstractRepository;
use Illuminate\Contracts\Container\Container;

class AuthenticationRepository extends AbstractRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(Authentication::class)
            ->setRepositoryId(Authentication::getTableName())
            ->setCacheDriver('redis');
    }
}
