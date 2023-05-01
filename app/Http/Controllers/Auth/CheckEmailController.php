<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailQueue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Redis;
use RedisException;
use Src\Core\MainConsts;

class CheckEmailController extends Controller
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

        $this->redis->hSet(MainConsts::SendAcceptCodeEmail, $request->email, igbinary_serialize($accept_code));
        $this->redis->expire(MainConsts::SendAcceptCodeEmail . $request->email, 360);

        SendMailQueue::dispatch(Str::studly(MainConsts::SendAcceptCodeEmail), ['accept_code' => $accept_code]);

        return jsponse();
    }
}
