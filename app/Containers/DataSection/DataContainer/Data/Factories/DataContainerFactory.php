<?php

namespace Containers\DataSection\DataContainer\Data\Factories;

use Containers\DataSection\DataContainer\Models\DataContainer;
use Ship\Parents\Factories\Factory as ParentFactory;

class DataContainerFactory extends ParentFactory
{
    protected $model = DataContainer::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
