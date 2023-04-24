<?php

declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
