<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserContract;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Redis;
use RedisException;
use Src\Core\MainConsts;

class CheckCodeController extends Controller
{
    /**
     * @throws RedisException
     */
    public function __construct(protected readonly Redis $redis, private readonly UserContract $userContract)
    {
        $this->redis->connect('localhost');
    }


    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Redirector|RedirectResponse|JsonResponse
     * @throws RedisException
     */
    public function __invoke(Request $request
    ): Redirector|RedirectResponse|JsonResponse {
        $is_sent_code = $this->redis->hMGet(
            MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'),
            ['auth', 'code', 'email']
        );

        if (!$is_sent_code) {
            $equal_all_data = false;
        } elseif (!$is_sent_code['auth'] || !$is_sent_code['code'] || !$is_sent_code['email']) {
            $equal_all_data = false;
        } else {
            $equal_all_data = igbinary_unserialize($is_sent_code['email']) === $request->email
                && igbinary_unserialize($is_sent_code['code']) === $request->code
                && igbinary_unserialize($is_sent_code['auth']) === $request->cookie('authenticator');
        }

        if (!$equal_all_data) {
            return jsponse(['message' => 'Unauthorized', 'redirect' => true], 422);
        }

        $this->redis->hDel(
            MainConsts::ACCEPT_CODE_EMAIL . ':' . $request->cookie('authenticator'),
            'auth',
            'code',
            'email'
        );

        $this->authorizeUser($request->email);

        return redirect('noix.index-noix');
    }

    private function authorizeUser(string $email)
    {
        $user = $this->userContract->create(['email' => $email, 'verified_at' => now()]);

        if (!$user) {
            throw new AuthorizationException();
        }

        Auth::attempt(['email' => $email, 'password' => Str::random(32)], true);
    }
}
