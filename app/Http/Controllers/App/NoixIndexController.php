<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Action;

class NoixIndexController extends Action
{
    public function __construct()
    {
    }

    public function __invoke($workspace_id)
    {
        return view('app.dashboard');
    }
}
