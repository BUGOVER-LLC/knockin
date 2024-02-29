<?php

declare(strict_types=1);

namespace Src\Http\Controllers\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Redis;
use RedisException;
use Src\Core\Abstract\AbstractAction;
use Src\Core\Enum\EmailType;

class SignInController extends AbstractAction
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
        $is_sent_code = $this->redis->hMGet(
            EmailType::acceptCodeEmail->value . ':' . $request->cookie('authenticator'),
            ['auth', 'code', 'email']
        );

        if (!$is_sent_code) {
            $has_accept_code = false;
        } elseif (!$is_sent_code['auth'] || !$is_sent_code['code'] || !$is_sent_code['email']) {
            $has_accept_code = false;
        } else {
            $has_accept_code = igbinary_unserialize($is_sent_code['auth']) === $request->cookie('authenticator');
            $email = igbinary_unserialize($is_sent_code['email']);
        }

        return view('app.signin', ['code' => $has_accept_code, 'email' => $email ?? '']);
    }
}
