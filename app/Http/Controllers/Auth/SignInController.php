<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Action;

class SignInController extends Action
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        return view('app.signin');
    }
}
