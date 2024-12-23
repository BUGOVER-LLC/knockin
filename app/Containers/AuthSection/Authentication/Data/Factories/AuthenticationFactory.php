<?php

namespace Containers\AuthSection\Authentication\Data\Factories;

use Containers\AuthSection\Authentication\Models\Authentication;
use Ship\Parents\Factories\Factory as ParentFactory;

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
