<?php

declare(strict_types=1);

namespace Src\Service;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Src\Exception\CreateUserException;
use Src\Models\User;
use Src\Repositories\UserRepository;

class AuthService
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    /**
     * @param string $email
     * @param string $code
     * @return User
     * @throws \JsonException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    private function authorizeUser(string $email, string $code): User
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            try {
                $this->userRepository->createUserOnRegister($email, Hash::make($code));
            } catch (Exception $exception) {
                logging($exception);

                throw new CreateUserException();
            }
        }
        Event::dispatch('auth.User.authentication', [$user->id]);

        Auth::getProvider()->retrieveByCredentials(['email' => $email]);
        Auth::attempt(['email' => $email, 'password' => $code], true);
        Auth::setUser($user);

        return $user;
    }
}
