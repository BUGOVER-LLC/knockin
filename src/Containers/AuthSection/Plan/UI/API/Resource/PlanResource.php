<?php

declare(strict_types=1);

namespace Containers\AuthSection\Plan\UI\API\Resource;

use Containers\AuthSection\Plan\Model\Plan;
use Illuminate\Http\Request;
use Nucleus\Abstracts\Schema\Schema;
use Ship\Parent\Resource\Resource as ParentResource;

class PlanResource extends ParentResource
{
    public function toSchema(Request $request): Schema|string
    {
        // TODO: Implement toSchema() method.
    }
}
