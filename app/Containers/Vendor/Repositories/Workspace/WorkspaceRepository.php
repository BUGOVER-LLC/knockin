<?php

declare(strict_types=1);

namespace Containers\Vendor\Repositories\Workspace;

use Containers\Vendor\Models\Workspace;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Collection;
use Nucleus\Repository\Repositories\BaseRepository;

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

    /**
     * @param string $email
     * @return Collection|Workspace
     */
    public function getWorkspaceByUserEmail(string $email): Collection|Workspace
    {
        return $this
            ->whereHas('workers', fn($query) => $query->where('email', '=', $email))
            ->findAll();
    }
}
