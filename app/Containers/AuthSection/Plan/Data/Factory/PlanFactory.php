<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\Data\Factory;

use Containers\AuthSection\Plan\Model\Plan;
use Ship\Parent\Factory\Factory as ParentFactory;

class PlanFactory extends ParentFactory
{
    protected $model = Plan::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
