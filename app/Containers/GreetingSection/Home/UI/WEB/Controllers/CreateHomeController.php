<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\UI\WEB\Controllers;

use Containers\GreetingSection\Home\UI\WEB\Requests\CreateHomeRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Ship\Parents\Controllers\WebController;

class CreateHomeController extends WebController
{
    public function __invoke(CreateHomeRequest $request): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('greetingSection@home::index');
    }
}
