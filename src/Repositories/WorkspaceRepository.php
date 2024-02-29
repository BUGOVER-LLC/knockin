<?php

declare(strict_types=1);

namespace Src\Repositories;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Collection;
use JsonException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Service\Repository\Repositories\EloquentRepository;
use Src\Models\Workspace;

class WorkspaceRepository extends EloquentRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container)
            ->setModel(Workspace::class)
            ->setCacheDriver('redis')
            ->setRepositoryId((new Workspace())->getTable());
    }

    /**
     * @param string $email
     * @return Collection
     * @throws ContainerExceptionInterface
     * @throws JsonException
     * @throws NotFoundExceptionInterface
     */
    public function getWorkspacesByUserEmail(string $email): Collection
    {
        return $this
            ->whereHas('workers', fn($query) => $query->where('email', '=', $email))
            ->findAll();
    }
}
