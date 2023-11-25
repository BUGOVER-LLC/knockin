<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Auth\UI\WEB\Controllers;

use Containers\GreetingSection\Auth\Jobs\SendMailQueue;
use Containers\GreetingSection\Auth\UI\WEB\Requests\CheckEmailRequest;
use Containers\Vendor\MainConsts;
use Illuminate\Http\JsonResponse;
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
     * @param CheckEmailRequest $request
     * @return JsonResponse
     * @throws RedisException
     */
    public function __invoke(CheckEmailRequest $request): JsonResponse
    {
        $accept_code = Str::upper(Str::random(6));

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

        return jsponse(['message' => trans('messages.accept_code_sent', ['email' => $request->email])]);
    }
}
