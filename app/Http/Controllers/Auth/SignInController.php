<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Action;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SignInController extends Action
{
    public function __construct()
    {
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function __invoke(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('app.signin');
    }
}
