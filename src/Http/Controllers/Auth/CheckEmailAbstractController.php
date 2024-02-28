<?php

declare(strict_types=1);

namespace Src\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use RedisException;
use Src\Core\Abstracts\AbstractController;
use Src\Http\Action\CheckEmailAction;
use Src\Http\Request\CheckEmailRequest;

class CheckEmailAbstractController extends AbstractController
{
    /**
     * Handle the incoming request.
     *
     * @param CheckEmailRequest $request
     * @param CheckEmailAction $action
     * @return JsonResponse
     * @throws RedisException
     */
    public function __invoke(CheckEmailRequest $request, CheckEmailAction $action): JsonResponse
    {
        $dto = $request->toDTO();
        $action->execute($dto);

        return jsponse(['message' => 'successful']);
    }
}
