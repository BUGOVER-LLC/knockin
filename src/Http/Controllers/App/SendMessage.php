<?php

declare(strict_types=1);

namespace Src\Http\Controllers\App;

use Illuminate\Http\Request;
use Src\Http\Controllers\Controller;

class SendMessage extends Controller
{
    public function __construct()
    {

    }

    public function __invoke(Request $request)
    {
        dd($request->all());
    }
}
