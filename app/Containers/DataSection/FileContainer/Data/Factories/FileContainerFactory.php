<?php

namespace Containers\DataSection\FileContainer\Data\Factories;

use Containers\DataSection\FileContainer\Models\FileContainer;
use Ship\Parents\Factories\Factory as ParentFactory;

class FileContainerFactory extends ParentFactory
{
    protected $model = FileContainer::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
