<?php

declare(strict_types=1);

namespace Src\Service;

use Illuminate\Support\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Src\Repositories\WorkspaceRepository;

class WorkspaceService
{
    /**
     * @param WorkspaceRepository $workspaceRepository
     */
    public function __construct(private readonly WorkspaceRepository $workspaceRepository)
    {
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws \JsonException
     */
    public function getWorkspacesByClientEmail(string $email): array|Collection
    {
        return $this->workspaceRepository->getWorkspacesByUserEmail($email);
    }
}
