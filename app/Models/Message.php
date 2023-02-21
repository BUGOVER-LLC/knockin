<?php

declare(strict_types=1);

namespace App\Models;

use Service\Models\Entity\ServiceModel;

class Message extends ServiceModel
{
    protected $casts = [
        'body' => '{"text": "","link": "","image": "","video": "","archive": "","code": "","voice":""}',
    ];
}
