<?php

declare(strict_types=1);

namespace Containers\Auth\UI\WEB\Controllers;

use App\Containers\Vendor\MainConsts;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Redis;
use RedisException;
use Ship\Parents\Controllers\WebController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="auth_get_sign", path="auth", methods={"GET"})
 *
 * Get SignIn Page and check has sent acceptCode
 */
class SignInController extends WebController
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
     * @return View|Factory
     * @throws RedisException
     */
    public function __invoke(Request $request): View|Factory
    {
        $is_sent_code = $this->redis->hMGet(
            MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'),
            ['auth', 'code', 'email']
        );

        if (!$is_sent_code) {
            $has_accept_code = false;
        } elseif (!$is_sent_code['auth'] || !$is_sent_code['code'] || !$is_sent_code['email']) {
            $has_accept_code = false;
        } else {
            $has_accept_code = igbinary_unserialize($is_sent_code['auth']) === $request->cookie('authenticator');
        }

        return view('auth::auth.layout', ['code' => $has_accept_code, 'email' => $request->email]);
    }
}
