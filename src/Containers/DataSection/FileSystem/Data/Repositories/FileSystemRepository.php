<?php

declare(strict_types=1);

namespace Containers\DataSection\FileSystem\Data\Repositories;

use Ship\Parent\Repositories\Repository as AbstractRepository;
use Illuminate\Contracts\Container\Container;

class FileSystemRepository extends AbstractRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(FileSystem::class)
            ->setRepositoryId(FileSystem::getTableName())
            ->setCacheDriver('redis');
    }
}
