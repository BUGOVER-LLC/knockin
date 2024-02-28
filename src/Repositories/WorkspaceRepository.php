<?php

declare(strict_types=1);

namespace Src\Repositories;

use Illuminate\Support\Collection;
use Src\Core\Abstracts\AbstractRepository;
use Src\Models\Workspace;

class WorkspaceRepository extends AbstractRepository
{
    /**
     * @param Workspace $model
     */
    public function __construct(Workspace $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $email
     * @return Collection|Workspace
     */
    public function getWorkspacesByUserEmail(string $email): Collection|Workspace
    {
        return $this
            ->createModelBuilder()
            ->whereHas('workers', fn($query) => $query->where('email', '=', $email))
            ->get();
    }
}
