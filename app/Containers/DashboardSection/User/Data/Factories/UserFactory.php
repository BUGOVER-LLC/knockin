<?php

namespace Containers\DashboardSection\User\Data\Factories;

use Containers\DashboardSection\User\Models\User;
use Ship\Parents\Factories\Factory as ParentFactory;

class UserFactory extends ParentFactory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
