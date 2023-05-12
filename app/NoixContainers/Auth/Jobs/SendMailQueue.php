<?php

declare(strict_types=1);

namespace App\NoixContainers\Auth\Jobs;

use App\NoixContainers\Auth\Mail\AcceptCode;
use App\Ship\Parents\Jobs\Job;
use Illuminate\Support\Facades\Mail;
use Src\Core\MainConsts;

/**
 * @method static dispatch(string $context, string $address, array $body = []): \Illuminate\Foundation\Bus\Dispatchable
 */
class SendMailQueue extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private readonly string $context,
        private readonly string $address,
        private readonly array $body = []
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        switch ($this->context) {
            case MainConsts::ACCEPT_CODE_EMAIL:
                Mail::to($this->address)->send(new AcceptCode($this->address, $this->body));
                break;
        }
    }
}
