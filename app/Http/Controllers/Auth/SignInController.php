<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Action;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Redis;
use RedisException;
use Src\Core\MainConsts;

class SignInController extends Action
{
    /**
     * @param Redis $redis
     * @throws RedisException
     */
    public function __construct(protected readonly Redis $redis)
    {
        $this->redis->connect('localhost');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     * @throws RedisException
     */
    public function __invoke(Request $request): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $is_sent_code = $this->redis->hGet(MainConsts::SendAcceptCodeEmail, $request->email ?? '');

        return view('app.signin', ['code' => (bool)$is_sent_code, 'email' => $request->email]);
    }
}
