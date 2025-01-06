<?php

namespace Containers\AuthSection\Oauth\Data\Factories;

use Containers\AuthSection\Oauth\Models\Oauth;
use Ship\Parent\Factories\Factory as ParentFactory;

class OauthFactory extends ParentFactory
{
    protected $model = Oauth::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
