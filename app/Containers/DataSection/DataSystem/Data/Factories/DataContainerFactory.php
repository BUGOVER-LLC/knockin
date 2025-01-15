<?php

namespace Containers\DataSection\DataSystem\Data\Factories;

use Containers\DataSection\DataSystem\Model\DataContainer;
use Ship\Parent\Factories\Factory as ParentFactory;

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
