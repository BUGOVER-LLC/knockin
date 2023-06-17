<?php

declare(strict_types=1);

namespace Containers\AppSection\Greeting\UI\WEB\Controllers;

use Containers\Vendor\Repositories\Workspace\WorkspaceContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Ship\Parents\Controllers\WebController;

class GreetingIndexController extends WebController
{
    public function __construct(protected WorkspaceContract $workspaceContract)
    {
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(): \Illuminate\Foundation\Application|View|Factory|Application
    {
//        for ($i = 0; $i < 2000; ++$i) {
//            $this->workspaceContract->create([
//                'creator_id' => 3,
//                'uid' => Str::uuid()->toString(),
//                'name' => Str::random(),
//            ]);
//        }
//        $this->workspaceContract->where('workspace_id', '!=', null)->deletes();
//        $this->workspaceContract->whereIn('workspace_id', [33694, 33695, 33696, 33697, 33698, 33703, 33709, 33713, 33714, 33717, 33718])->findAll();

//        $this->workspaceContract->join('users', 'users.user_id', '=', 'workspaces.creator_id')->findAll();

        return view('appSection@greeting::index.layout');
    }
}
