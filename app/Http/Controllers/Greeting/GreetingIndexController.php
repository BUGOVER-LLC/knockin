<?php

declare(strict_types=1);

namespace App\Http\Controllers\Greeting;

use App\Http\Action;
use App\Repositories\Workspace\WorkspaceContract;

class GreetingIndexController extends Action
{
    public function __construct(protected WorkspaceContract $workspaceContract)
    {
    }

    public function __invoke()
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

        return view('app.index');
    }
}
