<?php

declare(strict_types=1);

namespace Containers\DashboardSection\Index\UI\WEB\Controllers;

use Ship\Parents\Controllers\WebController;

class MainBoardController extends WebController
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        return view('dashboardSection@index::index');
    }
}
