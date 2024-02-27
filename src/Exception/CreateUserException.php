<?php

declare(strict_types=1);

namespace Src\Exception;

use Illuminate\Http\JsonResponse;
use RuntimeException;

class CreateUserException extends RuntimeException
{
    /**
     * @return JsonResponse
     */
    public function render(): \Illuminate\Http\JsonResponse
    {
        return jsponse(['message' => 'Server error during created user'], 500);
    }
}
