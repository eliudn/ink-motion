<?php

namespace Src\Application\UserInformation\Application\Update;

use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\UserInformation\Domain\Contracts\UserInformationRepositoryContract;
use Src\Application\UserInformation\Domain\ValueObjects\BirthdateValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\EmailValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\FirstNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\LastNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\PhoneNumberValueObject;

class UserInformationUpdateUseCase
{
    public function __construct(
        private readonly UserInformationRepositoryContract $userInformationRepositoryContract,
        private readonly UserShowUseCase $userShowUseCase
    )
    {
    }

    public function __invoke(array $request,string $userId)
    {
        $user = $this->userShowUseCase->__invoke($userId);
        return $this->userInformationRepositoryContract->update(
            new FirstNameValueObject($request["firstname"]),
            new LastNameValueObject($request["lastname"]),
            new BirthdateValueObject($request["birthdate"]),
            new EmailValueObject($user->entity()["email"]),
            new PhoneNumberValueObject($request["phoneNumber"]),
            new UserIdValueObject($userId)
        );
    }

}
