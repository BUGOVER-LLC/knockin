<?php

declare(strict_types=1);

namespace Containers\DataSection\DataContainer\Data\Repositories;

use Containers\DataSection\DataContainer\Models\Message;
use Illuminate\Contracts\Container\Container;
use Ship\Parents\Repositories\Repository as AbstractRepository;

class MessageRepository extends AbstractRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(Message::class)
            ->setRepositoryId(Message::getTableName())
            ->setCacheDriver('redis');
    }
}
