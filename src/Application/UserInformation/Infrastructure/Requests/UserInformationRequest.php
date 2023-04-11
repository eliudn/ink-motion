<?php

namespace Src\Application\UserInformation\Infrastructure\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Src\Application\UserInformation\Infrastructure\Exceptions\UserInformationRequestFailedException;
use Src\Shared\Infrastructure\Helper\HttpCodeHelper;
use Src\Shared\Infrastructure\Helper\RequestHelper;

class UserInformationRequest extends FormRequest
{


    use RequestHelper, HttpCodeHelper;

    /**
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'birthdate' => 'required|date',
            'phoneNumber' => 'required|numeric'
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws UserInformationRequestFailedException
     */
    public function failedValidation(Validator $validator): void
    {
        throw new UserInformationRequestFailedException(
            $this->formatErrorsRequest($validator->errors()->all()),
            // $validator->errors()->all(),
            $this->badRequest());
    }
}
