<?php

declare(strict_types=1);

namespace Src\Repositories;

use Exception;
use Illuminate\Contracts\Container\Container;
use JsonException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Service\Repository\Repositories\EloquentRepository;
use Src\Models\User;

class UserRepository extends EloquentRepository
{
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container)
            ->setModel(User::class)
            ->setCacheDriver('redis')
            ->setRepositoryId((new User())->getTable());
    }

    /**
     * @param string $email
     * @return User|null
     * @throws JsonException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function findByEmail(string $email): ?User
    {
        $this->where('email', '=', $email)->findFirst();
    }

    /**
     * @param string $email
     * @param string $password
     * @return User
     */
    public function createUserOnRegister(string $email, string $password): User
    {
        try {
            $result = $this->create([
                'email' => $email,
                'password' => $password,
                'verified_at' => now(),
            ]);
        } catch (Exception $exception) {
            logging($exception);
        }

        return $result;
    }
}
