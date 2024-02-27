<?php

declare(strict_types=1);

namespace Src\Core\Abstracts;

use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

/**
 * Class BookkeepingCompanyPaginateRequest
 * @package Src\Http\Requests\SystemWorker
 * @method moreValidation(\Illuminate\Validation\Validator $validator)
 */
abstract class AbstractRequest extends FormRequest
{
    /**
     * @var string
     */
    private const VALIDATE_FLOAT_OR_INT = '/^(?=.)([+-]?([0-9]*)(\.([0-9]+))?)$/';

    /**
     * @var string
     */
    private const VALIDATE_STRING_OR_INT = '/^[a-z0-9 ]+$/i';

    /**
     * @var bool
     */
    protected bool $strict = true;

    /**
     * @return \Illuminate\Validation\Validator
     */
    public function validator(): \Illuminate\Validation\Validator
    {
        $v = Validator::make($this->input(), $this->rules(), $this->messages(), $this->attributes());

        if (method_exists(static::class, 'moreValidation')) {
            $this->moreValidation($v);
        }

        return $v;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules(): array;

    abstract public function toDTO(): object;

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    final public function messages(): array
    {
        return $this->errorMessages();
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function errorMessages(): array
    {
        return [];
    }

    /**
     * Handle a passed validation attempt.
     *
     * @throws Exception
     */
    protected function passedValidation(): void
    {
        if (!$this->strict) {
            return;
        }

        if (!config('app.strict') || app()->isProduction()) {
            return;
        }

        $all_with_dots = Arr::dot($this->all());
        $validated_with_dots = Arr::dot($this->validated());

        $not_validated_fields = array_keys(array_diff_key($all_with_dots, $validated_with_dots));

        if (!empty($not_validated_fields)) {
            throw new RuntimeException(
                trans('validation.all_request_validation', ['fields' => implode(', ', $not_validated_fields)]),
                423
            );
        }

        $rules_with_dots = Arr::dot($this->rules());

        $empty_rules = array_filter($rules_with_dots, static function ($rule) {
            return empty($rule);
        });

        if (!empty($empty_rules)) {
            throw new RuntimeException(
                trans('validation.all_request_empty', ['fields' => implode(', ', array_keys($empty_rules))]),
                423
            );
        }

        parent::passedValidation();
    }

    /**
     * @return string
     */
    protected function getFloatOrInPattern(): string
    {
        return self::VALIDATE_FLOAT_OR_INT;
    }

    /**
     * @return string
     */
    protected function getStringOrIntPattern(): string
    {
        return self::VALIDATE_STRING_OR_INT;
    }
}
