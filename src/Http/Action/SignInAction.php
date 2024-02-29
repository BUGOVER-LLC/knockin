<?php

declare(strict_types=1);

namespace Src\Http\Action;

use Redis;
use RedisException;
use Src\Core\MainConsts;

class SignInAction
{
    /**
     * @param Redis $redis
     * @throws RedisException
     */
    public function __construct(protected readonly Redis $redis)
    {
        $this->redis->connect('localhost');
    }

    public function execute()
    {
//        $is_sent_code = $this->redis->hMGet(
//            MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'),
//            ['auth', 'code', 'email']
//        );
//
//        if (!$is_sent_code) {
//            $has_accept_code = false;
//        } elseif (!$is_sent_code['auth'] || !$is_sent_code['code'] || !$is_sent_code['email']) {
//            $has_accept_code = false;
//        } else {
//            $has_accept_code = igbinary_unserialize($is_sent_code['auth']) === $request->cookie('authenticator');
//            $email = igbinary_unserialize($is_sent_code['email']);
//        }
    }
}
