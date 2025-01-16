<?php

declare(strict_types=1);

namespace Containers\GreetingSection\Home\UI\WEB\Controller;

use Containers\GreetingSection\Home\UI\WEB\Request\CreateHomeRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Ship\Parent\Controller\WebController;

class CreateHomeController extends WebController
{
    public function __invoke(CreateHomeRequest $request): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('greeting-section@home::page.hero');
    }
}
