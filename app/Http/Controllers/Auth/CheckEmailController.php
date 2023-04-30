<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailQueue;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckEmailController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $accept_code = Str::random(6);

        SendMailQueue::dispatch('SendAcceptCodeEmail', ['accept_code' => $accept_code]);

        return jsponse();
    }
}
