<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\Data\Factory;

use Containers\AuthSection\Authentication\Model\Authentication;
use Ship\Parent\Factory\Factory as ParentFactory;

class AuthenticationFactory extends ParentFactory
{
    protected $model = Authentication::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
