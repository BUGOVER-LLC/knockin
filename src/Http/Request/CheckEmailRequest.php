<?php

declare(strict_types=1);

namespace Src\Http\Request;

use Src\Core\Abstract\AbstractRequest;
use Src\Http\DTO\CheckEmailDTO;

/**
 * @property string $email
 * @property string $authenticator
 */
class CheckEmailRequest extends AbstractRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required'
            ],
            'authenticator' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'authenticator' => $this->cookie('authenticator'),
        ]);
    }

    public function toDTO(): CheckEmailDTO
    {
        return new CheckEmailDTO(
            $this->email,
            $this->authenticator
        );
    }
}
