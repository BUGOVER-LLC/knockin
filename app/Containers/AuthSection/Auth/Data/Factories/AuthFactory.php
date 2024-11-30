<?php

namespace Containers\AuthSection\Auth\Data\Factories;

use Containers\AuthSection\Auth\Models\Auth;
use Ship\Parents\Factories\Factory as ParentFactory;

class AuthFactory extends ParentFactory
{
    protected $model = Auth::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
