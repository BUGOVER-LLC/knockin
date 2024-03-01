<?php

declare(strict_types=1);

namespace Src\Repositories;

use Illuminate\Contracts\Container\Container;
use JsonException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Service\Repository\Repositories\EloquentRepository;
use Src\Models\WorkspaceLogo;

class WorkspaceLogoRepository extends EloquentRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this
            ->setContainer($container)
            ->setModel(WorkspaceLogo::class)
            ->setCacheDriver('redis')
            ->setRepositoryId((new WorkspaceLogo())->getTable());
    }

    /**
     * @param int $workspace_id
     * @return WorkspaceLogo
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws JsonException
     */
    public function findLogoByWorkspaceId(int $workspace_id): WorkspaceLogo
    {
        return $this->where('workspace_id', '=', $workspace_id)->findFirst();
    }

    /**
     * @param string $name
     * @return WorkspaceLogo
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws JsonException
     */
    public function findLogoByWorkspaceName(string $name): WorkspaceLogo
    {
        return $this->whereHas('workspace', fn($builder) => $builder->where('name', '=', $name))->findFirst();
    }
}
