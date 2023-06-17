<?php

declare(strict_types=1);

namespace App\Containers\Vendor\Providers;

use App\Containers\Vendor\Repositories\Workspace\WorkspaceContract;
use App\Containers\Vendor\Repositories\Workspace\WorkspaceRepository;

class MainServiceProvider extends \Ship\Parents\Providers\MainServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(WorkspaceContract::class, WorkspaceRepository::class);
    }
}
