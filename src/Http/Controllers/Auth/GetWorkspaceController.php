<?php

declare(strict_types=1);

namespace Src\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Infrastructure\Http\Resource\WorkspaceResource;
use Redis;
use RedisException;
use Src\Core\Abstract\AbstractController;
use Src\Core\Enum\EmailType;
use Src\Service\WorkspaceService;

class GetWorkspaceController extends AbstractController
{
    /**
     * @throws RedisException
     */
    public function __construct(private readonly Redis $redis)
    {
        $this->redis->connect('localhost');
    }

    /**
     * @param Request $request
     * @param WorkspaceService $workspaceService
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws RedisException
     */
    public function __invoke(Request $request, WorkspaceService $workspaceService)
    {
        $auth_data = $this->redis->hMGet(
            EmailType::acceptCodeEmail->value . ':' . $request->cookie('authenticator'),
            ['auth', 'code', 'email']
        );

        $email = igbinary_unserialize($auth_data['email']);
        $workspaces = $workspaceService->getWorkspacesByClientEmail($email);

        return WorkspaceResource::collection($workspaces);
    }
}
