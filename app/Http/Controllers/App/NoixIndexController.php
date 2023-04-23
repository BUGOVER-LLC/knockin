<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Action;

class NoixIndexController extends Action
{
    public function __construct()
    {
    }

    public function __invoke()
    {
        dd(111);
    }
}
