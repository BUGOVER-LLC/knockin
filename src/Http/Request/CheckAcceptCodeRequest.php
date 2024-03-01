<?php

declare(strict_types=1);

namespace Src\Http\Request;

use Override;
use Src\Core\Abstract\AbstractRequest;
use Src\Http\DTO\CheckAcceptCodeDTO;

/**
 * @property string $code
 * @property string $email
 * @property string $authenticator
 */
class CheckAcceptCodeRequest extends AbstractRequest
{
    #[Override] public function rules(): array
    {
        return [
            'code' => [
                'required',
                'string',
                'max:6',
                'min:6',
            ],
            'email' => [
                'required',
                'string',
                'max:100',
                'min:5',
            ],
            'authenticator' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $this->merge(['authenticator' => $this->cookie('authenticator')]);
    }

    /**
     * @return CheckAcceptCodeDTO
     */
    #[Override] public function toDTO(): CheckAcceptCodeDTO
    {
        return new CheckAcceptCodeDTO(
            $this->code,
            $this->email,
            $this->authenticator
        );
    }
}
