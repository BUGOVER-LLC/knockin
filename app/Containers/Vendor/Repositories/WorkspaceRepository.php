<?php

declare(strict_types=1);

namespace App\Containers\Vendor\Repositories;

use Containers\Vendor\Models\Workspace;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Ship\Parents\Repositories\Repository;

class WorkspaceRepository extends Repository
{
    /**
     * @param Workspace $workspace
     */
    public function __construct(private readonly Workspace $workspace)
    {
        parent::__construct($this->workspace);
    }

    /**
     * @param string $email
     * @return ?Collection<Workspace>
     */
    public function getWorkspacesByUserEmail(string $email): ?Collection
    {
        return $this->createModelBuilder()
            ->whereHas('workers', fn(Builder $query) => $query->where('email', '=', $email))
            ->get();
    }
}
