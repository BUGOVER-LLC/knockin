<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\Domain\Repository;

use Containers\PaymentSection\Subscribe\Domain\Model\Subscribe;
use Illuminate\Contracts\Container\Container;
use Ship\Parent\Repository\Repository as AbstractRepository;

class SubscribeRepository extends AbstractRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(Subscribe::class)
            ->setRepositoryId(Subscribe::getTableName())
            ->setCacheDriver('redis');
    }
}
