<?php

declare(strict_types=1);

namespace Containers\Vendor\Providers;

use Containers\Vendor\Repositories\User\UserContract;
use Containers\Vendor\Repositories\User\UserRepository;
use Containers\Vendor\Repositories\Workspace\WorkspaceContract;
use Containers\Vendor\Repositories\Workspace\WorkspaceRepository;

class MainServiceProvider extends \Ship\Parents\Providers\MainServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(WorkspaceContract::class, WorkspaceRepository::class);
        $this->app->bind(UserContract::class, UserRepository::class);
        $this->app->register(RedisProvider::class);
    }
}
