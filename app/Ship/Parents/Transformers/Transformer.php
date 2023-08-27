<?php

namespace Ship\Parents\Transformers;

use Illuminate\Support\Facades\Auth;
use Nucleus\Abstracts\Transformers\Transformer as AbstractTransformer;

abstract class Transformer extends AbstractTransformer
{
    /**
     * @param array $adminResponse
     * @param array $clientResponse
     * @return array
     */
    public function ifAdmin(array $adminResponse, array $clientResponse): array
    {
        $user = Auth::user();

        if (!is_null($user) && $user->hasAdminRole()) {
            return array_merge($clientResponse, $adminResponse);
        }

        return $clientResponse;
    }
}
