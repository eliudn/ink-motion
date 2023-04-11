<?php

namespace Src\Application\UserInformation\Domain\Contracts;

use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\UserInformation\Domain\UserInformationEntity;
use Src\Application\UserInformation\Domain\ValueObjects\BirthdateValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\EmailValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\FirstNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\LastNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\PhoneNumberValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\UserInformationIdValueObject;

interface UserInformationRepositoryContract
{

    /**
     * @return UserInformationEntity
     */
    public function index():UserInformationEntity;

    /**
     * @param FirstNameValueObject $firstNameValueObject
     * @param LastNameValueObject $lastNameValueObject
     * @param BirthdateValueObject $birthdateValueObject
     * @param PhoneNumberValueObject $phoneNumberValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return UserInformationEntity
     */
    public function store(
        //?UserInformationIdValueObject $idValueObject ,
        FirstNameValueObject $firstNameValueObject,
        LastNameValueObject $lastNameValueObject,
        BirthdateValueObject $birthdateValueObject,
        EmailValueObject $emailValueObject,
        PhoneNumberValueObject $phoneNumberValueObject,
        UserIdValueObject $userIdValueObject
    ):UserInformationEntity;

    /**
     * @param UserIdValueObject $userIdValueObject
     * @return UserInformationEntity
     */
    public function show(UserIdValueObject $userIdValueObject, bool $except):UserInformationEntity;

    public function update(
        FirstNameValueObject $firstNameValueObject,
        LastNameValueObject $lastNameValueObject,
        BirthdateValueObject $birthdateValueObject,
        EmailValueObject $emailValueObject,
        PhoneNumberValueObject $phoneNumberValueObject,
        UserIdValueObject $userIdValueObject
    ):UserInformationEntity;

    public function destroy(UserIdValueObject $userIdValueObject):UserInformationEntity;
}
