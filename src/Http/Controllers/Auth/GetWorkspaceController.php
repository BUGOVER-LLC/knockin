<?php

declare(strict_types=1);

namespace Src\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Redis;
use RedisException;
use Src\Core\Abstracts\AbstractController;
use Src\Core\MainConsts;
use Src\Service\WorkspaceService;

class GetWorkspaceController extends AbstractController
{
    public function __construct(private readonly Redis $redis)
    {
        $this->redis->connect('localhost');
    }

    /**
     * @throws RedisException
     */
    public function __invoke(Request $request, WorkspaceService $workspaceService)
    {
        $email = $this->redis->hMGet(
            MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'),
            ['auth', 'code', 'email']
        );

        $workspaces = $workspaceService->getWorkspacesByClientEmail(igbinary_unserialize($email));
    }
}
