<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Data\Repositories;

use Ship\Parents\Repositories\Repository as AbstractRepository;
use Illuminate\Contracts\Container\Container;

class DataContainerRepository extends AbstractRepository
{
    /**
     * @param User $user
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(DataContainerRepository::class)
            ->setRepositoryId(DataContainerRepository::getTableName())
            ->setCacheDriver('redis');
    }
}
