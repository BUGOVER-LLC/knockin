<?php

declare(strict_types=1);

namespace Src\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use RedisException;
use Src\Core\Abstracts\AbstractController;
use Src\Http\Action\CheckAcceptCodeAction;
use Src\Http\Request\CheckAcceptCodeRequest;

class CheckCodeController extends AbstractController
{
    /**
     * Handle the incoming request.
     *
     * @param CheckAcceptCodeRequest $request
     * @param CheckAcceptCodeAction $action
     * @return JsonResponse
     * @throws RedisException
     */
    public function __invoke(CheckAcceptCodeRequest $request, CheckAcceptCodeAction $action): JsonResponse
    {
        $dto = $request->toDTO();
        $action->execute($dto);

        return jsponse([
            'message' => 'successful',
            'next' => true,
        ]);
    }
}
