<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Auth\UI\WEB\Controllers;

use Containers\Vendor\MainConsts;
use Containers\Vendor\Repositories\User\UserContract;
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
        $auth_data = $this->redis->hMGet(
            MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'),
            ['auth', 'code', 'email']
        );

        $email = $auth_data && $auth_data['email'] ? igbinary_unserialize($auth_data['email']) : $request->email;

        if (!$auth_data) {
            $has_accept_code = false;
        } elseif (!$auth_data['auth'] || !$auth_data['code'] || !$auth_data['email']) {
            $has_accept_code = false;
        } else {
            $has_accept_code = igbinary_unserialize($auth_data['auth']) === $request->cookie('authenticator');
        }

        return view('containers@auth::index', ['code' => $has_accept_code, 'email' => $email]);
    }
}
