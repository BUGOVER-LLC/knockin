<?php

declare(strict_types=1);

namespace Containers\AuthSection\Authentication\UI\API\Schema;

use Illuminate\Http\Request;
use Nucleus\Abstracts\Schema\Schema;
use Ship\Parent\Resource\Resource as ParentResource;

class AuthenticationSchema extends ParentResource
{
    public function toSchema(Request $request): Schema|string
    {
        // TODO: Implement toSchema() method.
    }
}
