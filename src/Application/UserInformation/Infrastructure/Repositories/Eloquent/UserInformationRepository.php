<?php

namespace Src\Application\UserInformation\Infrastructure\Repositories\Eloquent;

use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\UserInformation\Infrastructure\Repositories\Eloquent\UserInformation as Model;
use Src\Application\UserInformation\Domain\Contracts\UserInformationRepositoryContract;
use Src\Application\UserInformation\Domain\UserInformationEntity;
use Src\Application\UserInformation\Domain\ValueObjects\BirthdateValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\EmailValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\FirstNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\LastNameValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\PhoneNumberValueObject;
use Src\Application\UserInformation\Domain\ValueObjects\UserInformationIdValueObject;

class UserInformationRepository implements UserInformationRepositoryContract
{
    private $model;
    public function __construct(

    )
    {
        $this->model =new Model();
    }


    /**
     * @return UserInformationEntity
     */
    public function index(): UserInformationEntity
    {
        $user = $this->model->with('user')->get();
        return new UserInformationEntity($user->toArray());
    }


    /**
     * @param FirstNameValueObject $firstNameValueObject
     * @param LastNameValueObject $lastNameValueObject
     * @param BirthdateValueObject $birthdateValueObject
     *
     * @param PhoneNumberValueObject $phoneNumberValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return UserInformationEntity
     */
    public function store(
       // ?UserInformationIdValueObject $idValueObject,
        FirstNameValueObject $firstNameValueObject,
        LastNameValueObject $lastNameValueObject,
        BirthdateValueObject $birthdateValueObject,
        EmailValueObject $emailValueObject,
        PhoneNumberValueObject $phoneNumberValueObject,
        UserIdValueObject $userIdValueObject
    ): UserInformationEntity
    {
        $userInformation = $this->model->create([
            'first_name'=>$firstNameValueObject->value(),
            'last_name'=>$lastNameValueObject->value(),
            'birthdate'=>$birthdateValueObject->value(),
            'email'=>$emailValueObject->value(),
            'phone_number'=>$phoneNumberValueObject->value(),
            'user_id'=>$userIdValueObject->value(),
        ]);
        return new UserInformationEntity($userInformation->toArray());
    }


    /**
     * @param UserIdValueObject $userIdValueObject
     * @return UserInformationEntity
     */
    public function show(UserIdValueObject $userIdValueObject, bool $except): UserInformationEntity
    {
        $userInformation = $this->model->with('user')->where('user_id', $userIdValueObject->value())->first();

        if($except){
            if(is_null($userInformation)){
                return new UserInformationEntity(null, "USER_INFORMATION_NOT_FOUND");
            }
            return new UserInformationEntity($userInformation->toArray());
        }

        return new UserInformationEntity($userInformation);
    }


    /**
     * @param FirstNameValueObject $firstNameValueObject
     * @param LastNameValueObject $lastNameValueObject
     * @param BirthdateValueObject $birthdateValueObject
     * @param EmailValueObject $emailValueObject
     * @param PhoneNumberValueObject $phoneNumberValueObject
     * @param UserIdValueObject $userIdValueObject
     * @return UserInformationEntity
     */
    public function update(
        FirstNameValueObject $firstNameValueObject,
        LastNameValueObject $lastNameValueObject,
        BirthdateValueObject $birthdateValueObject,
        EmailValueObject $emailValueObject,
        PhoneNumberValueObject $phoneNumberValueObject,
        UserIdValueObject $userIdValueObject
    ): UserInformationEntity
    {
        $userInformation = $this->model->where('user_id', $userIdValueObject->value())->first();

        if(is_null($userInformation)){
            return new UserInformationEntity(null, "USER_INFORMATION_NOT_FOUND");
        }

        $userInformation->update([
            'first_name'=>$firstNameValueObject->value(),
            'last_name'=>$lastNameValueObject->value(),
            'birthdate'=>$birthdateValueObject->value(),
            'email'=>$emailValueObject->value(),
            'phone_number'=>$phoneNumberValueObject->value(),
            'user_id'=>$userIdValueObject->value(),
        ]);
        return  new UserInformationEntity($userInformation->toArray());
    }

    public function destroy(UserIdValueObject $userIdValueObject): UserInformationEntity
    {
        $userInformation = $this->model->where('user_id',$userIdValueObject->value())->first();

        if(is_null($userInformation)){
            return new UserInformationEntity(null, "USER_INFORMATION_NOT_FOUND");
        }

        $userInformation->delete();

        return new UserInformationEntity($userInformation->id);
    }
}
