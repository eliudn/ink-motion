<?php

namespace Src\Application\User\Infrastructure\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\Application\User\Infrastructure\Exceptions\UserRequestFailedException;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Helper\RequestHelper;
use Illuminate\Contracts\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    use RequestHelper, HttpCodeHelper;

    /**
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nickname' => 'required|max:45',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:125|min:8|confirmed',
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws UserRequestFailedException
     */
    public function failedValidation(Validator $validator): void
    {
        throw new UserRequestFailedException(
            $this->formatErrorsRequest($validator->errors()->all()),
           // $validator->errors()->all(),
            $this->badRequest());
    }
}
