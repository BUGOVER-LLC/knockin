<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\Provider;

use Containers\AuthSection\Authentication\Domain\Model\User;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class SubscribeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Cashier::useCustomerModel(User::class);
    }
}
