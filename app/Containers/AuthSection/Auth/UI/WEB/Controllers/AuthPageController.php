<?php

declare(strict_types=1);

namespace App\Containers\AuthSection\Auth\UI\WEB\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Ship\Parents\Controllers\WebController;

class AuthPageController extends WebController
{
    public function __invoke(): Application|\Illuminate\Contracts\View\View|Factory|View
    {
        return view('authSection@auth::index');
    }
}
