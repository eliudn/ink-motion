<?php

namespace Src\Application\UserInformation\Application\Store;

use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\UserInformation\Application\Get\UserInformationShowUseCase;
use Src\Application\UserInformation\Domain\Contracts\UserInformationRepositoryContract;
use Src\Application\UserInformation\Domain\Exceptions\DuplicateUserException;
use Src\Application\UserInformation\Domain\UserInformationEntity;
use Src\Application\UserInformation\Domain\ValueObjects\BirthdateValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\EmailValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\FirstNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\LastNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\PhoneNumberValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\UserInformationIdValueObject;

class UserInformationStoreUseCase
{
    public function __construct(
        private readonly UserInformationRepositoryContract $userInformationRepositoryContract,
        private readonly UserInformationShowUseCase $userInformationShowUseCase,
        private readonly UserShowUseCase $userShowUseCase
    )
    {
    }

    /**
     * @param array $request
     * @param string $userId
     * @return UserInformationEntity
     * @throws DuplicateUserException
     */
    public function __invoke(array $request, string $userId):UserInformationEntity
    {

        $userInformation = $this->userInformationShowUseCase->__invoke($userId, false);

        $userInformation->checkExist();

        $user = $this->userShowUseCase->__invoke($userId);

        return $this->userInformationRepositoryContract->store(

            new FirstNameValueObject($request["firstname"]),
            new LastNameValueObject($request["lastname"]),
            new BirthdateValueObject($request["birthdate"]),
            new EmailValueObject($user->getEmail()),
            new PhoneNumberValueObject($request["phoneNumber"]),
            new UserIdValueObject($userId)
        );
    }
}
