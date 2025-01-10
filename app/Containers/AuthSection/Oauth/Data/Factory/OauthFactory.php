<?php

declare(strict_types=1);

namespace Containers\AuthSection\Oauth\Data\Factory;

use Ship\Parent\Factory\Factory as ParentFactory;

class OauthFactory extends ParentFactory
{
    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
