<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Action;

class DashboardIndexController extends Action
{
    public function __construct()
    {
    }

    public function __invoke(string $workspace_id, ?string $target_id = null)
    {
        return view('app.dashboard');
    }
}
