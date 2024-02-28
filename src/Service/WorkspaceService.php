<?php

declare(strict_types=1);

namespace Src\Service;

use Src\Repositories\WorkspaceRepository;

class WorkspaceService
{
    public function __construct(private readonly WorkspaceRepository $workspaceRepository)
    {
    }

    public function getWorkspacesByClientEmail(string $email)
    {
        return $this->workspaceRepository->getWorkspacesByUserEmail($email);
    }
}
