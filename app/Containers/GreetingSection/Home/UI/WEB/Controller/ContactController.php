<?php

declare(strict_types=1);

namespace App\Containers\GreetingSection\Home\UI\WEB\Controller;

use Ship\Parent\Controller\WebController;

class ContactController extends WebController
{
    public function __invoke()
    {
        return view('greetingSection@home::page.contact');
    }
}
