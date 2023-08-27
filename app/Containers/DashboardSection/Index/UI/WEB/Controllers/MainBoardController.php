<?php

declare(strict_types=1);

namespace Containers\DashboardSection\Index\UI\WEB\Controllers;

use Containers\Vendor\Repositories\User\UserContract;
use Illuminate\Contracts\View\View;
use Ship\Parents\Controllers\WebController;

class MainBoardController extends WebController
{
    /**
     * @param UserContract $userContract
     */
    public function __construct(private readonly UserContract $userContract)
    {
    }

    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('dashboardSection@index::index');
    }
}
