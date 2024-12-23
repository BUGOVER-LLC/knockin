<?php

namespace Containers\DataSection\FileSystem\Data\Factories;

use Containers\DataSection\FileSystem\Models\FileSystem;
use Ship\Parents\Factories\Factory as ParentFactory;

class FileSystemFactory extends ParentFactory
{
    protected $model = FileSystem::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
