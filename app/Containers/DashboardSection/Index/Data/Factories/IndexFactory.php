<?php

namespace Containers\DashboardSection\Index\Data\Factories;

use Containers\DashboardSection\Index\Models\Index;
use Ship\Parents\Factories\Factory as ParentFactory;

class IndexFactory extends ParentFactory
{
    protected $model = Index::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
