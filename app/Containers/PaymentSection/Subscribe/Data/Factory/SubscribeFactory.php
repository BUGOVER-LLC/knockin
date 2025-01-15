<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\Data\Factory;

use Containers\PaymentSection\Subscribe\Domain\Model\Subscribe;
use Ship\Parent\Factory\Factory as ParentFactory;

class SubscribeFactory extends ParentFactory
{
    protected $model = Subscribe::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
