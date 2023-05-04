<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AcceptCode extends Mailable
{
    /**
     * Create a new message instance.
     */
    public function __construct(private readonly array $body)
    {
    }

    /**
     * @return AcceptCode
     */
    public function build(): AcceptCode
    {
        return $this->view('mails.accept-code', $this->body);
    }
}
