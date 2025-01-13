<?php

declare(strict_types=1);

namespace Containers\PaymentSection\Subscribe\UI\API\Resource;

use Illuminate\Http\Request;
use Ship\Parent\Resource\Resource as ParentResource;
use Ship\Parent\Schema\Schema;

class SubscribeResource extends ParentResource
{
    public function toSchema(Request $request): Schema|string
    {
        // TODO: Implement toSchema() method.
    }
}
