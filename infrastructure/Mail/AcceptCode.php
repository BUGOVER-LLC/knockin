<?php

declare(strict_types=1);

namespace Infrastructure\Mail;

use Illuminate\Mail\Mailable;

class AcceptCode extends Mailable
{
    /**
     * Create a new message instance.
     */
    public function __construct(private readonly string $froms, private readonly array $body)
    {
    }

    /**
     * @return AcceptCode
     */
    public function build(): AcceptCode
    {
        return $this
            ->to($this->froms)
            ->with(['accept_code' => $this->body['accept_code']])
            ->markdown('mails.accept-code', $this->body);
    }
}
