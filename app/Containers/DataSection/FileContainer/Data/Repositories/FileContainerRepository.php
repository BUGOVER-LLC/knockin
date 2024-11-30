<?php

declare(strict_types=1);

namespace Containers\DataSection\FileContainer\Data\Repositories;

use Ship\Parents\Repositories\Repository as AbstractRepository;
use Illuminate\Contracts\Container\Container;

class FileContainerRepository extends AbstractRepository
{
    /**
     * @param User $user
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(FileContainerRepository::class)
            ->setRepositoryId(FileContainerRepository::getTableName())
            ->setCacheDriver('redis');
    }
}
