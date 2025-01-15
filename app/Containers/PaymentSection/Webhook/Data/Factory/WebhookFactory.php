<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Webhook\Data\Factory;

use Containers\PaymentSection\Webhook\Domain\Model\Webhook;
use Ship\Parent\Factory\Factory as ParentFactory;

class WebhookFactory extends ParentFactory
{
    protected $model = Webhook::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
