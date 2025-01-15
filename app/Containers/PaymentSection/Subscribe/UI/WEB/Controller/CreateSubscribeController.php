<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\UI\WEB\Controller;

use Containers\PaymentSection\Subscribe\UI\WEB\Request\CreateSubscribeRequest;
use Containers\PaymentSection\Subscribe\UI\WEB\Request\StoreSubscribeRequest;
use Ship\Parent\Controller\WebController;

class CreateSubscribeController extends WebController
{
    public function create(CreateSubscribeRequest $request)
    {
        // ..
    }

    public function store(StoreSubscribeRequest $request)
    {
    }
}
