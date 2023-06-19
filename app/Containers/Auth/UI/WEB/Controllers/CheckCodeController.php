<?php

declare(strict_types=1);

namespace Containers\Auth\UI\WEB\Controllers;

use App\Containers\Vendor\MainConsts;
use App\Containers\Vendor\Models\User;
use App\Containers\Vendor\Repositories\User\UserContract;
use App\Containers\Vendor\Repositories\Workspace\WorkspaceContract;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Octane\Exceptions\DdException;
use Redis;
use RedisException;
use Ship\Parents\Controllers\WebController;

class CheckCodeController extends WebController
{
    /**
     * @throws RedisException
     */
    public function __construct(
        protected readonly Redis $redis,
        protected readonly UserContract $userContract,
        protected readonly WorkspaceContract $workspaceContract
    )
    {
        $this->redis->connect('localhost');
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Redirector|RedirectResponse|JsonResponse
     * @throws RedisException|DdException
     */
    public function __invoke(Request $request): Redirector|RedirectResponse|JsonResponse
    {
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

        $user = $this->authorizeUser($request->email, $request->code);
        Cookie::forget('authenticator');

        return jsponse(['message' => 'successful', 'redirect' => route('Asset.index-noix', ['target_id' => $user->uid])]);
    }

    /**
     * @param string $email
     * @param string $code
     * @return null|User
     * @throws DdException
     */
    private function authorizeUser(string $email, string $code): ?User
    {
        $user = $this->userContract->where('email', '=', $email)->findFirst();

        if (!$user) {
            try {
                $user = $this->userContract->create(
                    ['email' => $email, 'password' => Hash::make($code), 'verified_at' => now()]
                );
            } catch (Exception $exception) {
                logging($exception);
            }

            if (!$user) {
                throw new AuthorizationException();
            }
        }

        Auth::getProvider()->retrieveByCredentials(['email' => $email]);
        Auth::attempt(['email' => $email, 'password' => $code], true);
        Auth::setUser($user);

        return $user;
    }
}
