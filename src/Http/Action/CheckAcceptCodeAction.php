<?php

declare(strict_types=1);

namespace Src\Http\Action;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;
use Redis;
use RedisException;
use Src\Core\Enum\EmailType;
use Src\Exception\CreateUserException;
use Src\Http\DTO\CheckAcceptCodeDTO;
use Src\Models\User;
use Src\Repositories\UserRepository;

class CheckAcceptCodeAction
{
    /**
     * @param Redis $redis
     * @param UserRepository $userRepository
     */
    public function __construct(
        protected readonly Redis $redis,
        protected readonly UserRepository $userRepository,
    ) {
    }

    /**
     * @param CheckAcceptCodeDTO $dto
     * @return bool
     * @throws RedisException
     */
    public function execute(CheckAcceptCodeDTO $dto): bool
    {
        $is_sent_code = $this->redis->hMGet(
            EmailType::acceptCodeEmail->value . ':' . $dto->authenticator,
            ['auth', 'code', 'email']
        );

        if (!$is_sent_code) {
            $equal_all_data = false;
        } elseif (!$is_sent_code['auth'] || !$is_sent_code['code'] || !$is_sent_code['email']) {
            $equal_all_data = false;
        } else {
            $equal_all_data = igbinary_unserialize($is_sent_code['email']) === $dto->email
                && igbinary_unserialize($is_sent_code['code']) === $dto->acceptCode
                && igbinary_unserialize($is_sent_code['auth']) === $dto->authenticator;
        }

        if (!$equal_all_data) {
            throw new UnauthorizedException('Unauthorized');
        }

        Cookie::forget('authenticator');

        return true;
    }
}
