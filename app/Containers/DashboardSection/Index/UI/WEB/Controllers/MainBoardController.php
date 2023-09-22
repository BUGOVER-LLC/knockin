<?php

declare(strict_types=1);

namespace Containers\DashboardSection\Index\UI\WEB\Controllers;

use App\Containers\Vendor\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Ship\Parents\Controllers\WebController;

class MainBoardController extends WebController
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(private readonly UserRepository $userRepository)
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
