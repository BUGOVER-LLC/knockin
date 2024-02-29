<?php

declare(strict_types=1);

namespace Src\Repositories;

use Illuminate\Contracts\Container\Container;
use Service\Repository\Repositories\EloquentRepository;
use Src\Models\Board;

class BoardRepository extends EloquentRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container)
            ->setModel(Board::class)
            ->setCacheDriver('redis')
            ->setRepositoryId((new Board())->getTable());
    }
}
