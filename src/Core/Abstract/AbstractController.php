<?php

declare(strict_types=1);

namespace Src\Core\Abstract;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class AbstractController extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;
}
