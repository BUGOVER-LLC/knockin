<?php

declare(strict_types=1);

namespace NoixContainers\Auth\Mail;

use Ship\Parents\Mails\Mail;

class AcceptCode extends Mail
{
    /**
     * Create a new message instance.
     */
    public function __construct(private string $froms, private readonly array $body)
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
