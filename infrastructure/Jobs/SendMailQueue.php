<?php

declare(strict_types=1);

namespace Infrastructure\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Infrastructure\Mail\AcceptCode;
use Src\Core\Enum\EmailType;

/**
 * @method static dispatch(string $context, string $address, array $body = []): \Illuminate\Foundation\Bus\Dispatchable
 */
class SendMailQueue implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

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
            case EmailType::acceptCodeEmail->value:
                Mail::to($this->address)->send(new AcceptCode($this->address, $this->body));
                break;
        }
    }
}
