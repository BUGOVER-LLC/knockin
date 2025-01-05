<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\Data\Repositories;

use Containers\GreetingSection\Home\Models\Home;
use Ship\Parents\Repositories\Repository as AbstractRepository;
use Illuminate\Contracts\Container\Container;

class HomeRepository extends AbstractRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(Home::class)
            ->setRepositoryId(Home::getTableName())
            ->setCacheDriver('redis');
    }
}
