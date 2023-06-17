<?php

declare(strict_types=1);

namespace Containers\Auth\UI\WEB\Controllers;

use App\Containers\Vendor\MainConsts;
use Containers\Auth\Jobs\SendMailQueue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Redis;
use RedisException;
use Ship\Parents\Controllers\WebController;

class CheckEmailController extends WebController
{
    /**
     * @throws RedisException
     */
    public function __construct(protected readonly Redis $redis)
    {
        $this->redis->connect('localhost');
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws RedisException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $accept_code = Str::random(6);

        $this->redis->hMSet(
            MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'),
            [
                'code' => igbinary_serialize($accept_code),
                'auth' => igbinary_serialize($request->cookie('authenticator')),
                'email' => igbinary_serialize($request->email),
            ]
        );
        $this->redis->expire(MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'), 360);

        SendMailQueue::dispatch(
            MainConsts::ACCEPT_CODE_EMAIL,
            $request->email,
            ['accept_code' => $accept_code]
        );

        return jsponse();
    }
}
