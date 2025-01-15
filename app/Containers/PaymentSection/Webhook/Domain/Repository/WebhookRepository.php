<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Domain\Repository;

use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Illuminate\Contracts\Container\Container;
use Ship\Parent\Repository\Repository as AbstractRepository;

class WebhookRepository extends AbstractRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(Webhook::class)
            ->setRepositoryId(Webhook::getTableName())
            ->setCacheDriver('redis');
    }
}
