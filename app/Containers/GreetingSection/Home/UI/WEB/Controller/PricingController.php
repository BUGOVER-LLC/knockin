<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\UI\WEB\Controller;

use Ship\Parent\Controller\WebController;

class PricingController extends WebController
{
    public function __invoke()
    {
        return view('greetingSection@home::page.pricing');
    }
}
