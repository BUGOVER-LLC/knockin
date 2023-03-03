<?php

declare(strict_types=1);

namespace App\Repositories\Workspace;

use App\Models\Workspace;
use Illuminate\Contracts\Container\Container;
use Service\Repository\Repositories\BaseRepository;

class WorkspaceRepository extends BaseRepository implements WorkspaceContract
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container)
            ->setModel(Workspace::class)
            ->setCacheDriver('redis')
            ->setRepositoryId(Workspace::getTableName());
    }
}
