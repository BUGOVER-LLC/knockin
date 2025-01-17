<?php

declare(strict_types=1);

namespace Containers\DataSection\DataSystem\Data\Repositories;

use Containers\DataSection\DataSystem\Model\Message;
use Illuminate\Contracts\Container\Container;
use Ship\Parent\Repositories\Repository as AbstractRepository;

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
