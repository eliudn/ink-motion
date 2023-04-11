<?php

namespace Src\Application\UserInformation\Domain;

use Src\Application\User\Domain\Exceptions\UserNotFoundException;
use Src\Application\UserInformation\Domain\Exceptions\DuplicateUserException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

class UserInformationEntity extends Domain
{

    use HttpCodesDomainHelper;
    private mixed $value;
    const USER_NOT_FOUND = "USER_INFORMATION_NOT_FOUND";
    public function __construct(private mixed $entity = null, private ?string $exception = null)
    {
        parent::__construct($this->entity,$this->exception);
    }

    public function handle():array
    {
        return [
                "userId"=>$this->entity()["user"]["id"],
                "nickname"=>$this->entity()["user"]["nick_name"],
                "email"=>$this->entity()["user"]["email"],
                "firstName"=>$this->entity()["first_name"],
                "lastName"=>$this->entity()["last_name"],
                "birthdate"=>$this->entity()["birthdate"],
                "phoneNumber"=>$this->entity()["phone_number"],
                "created_at"=>$this->entity()["user"]["created_at"],
                "updated_at"=>$this->entity()["user"]["updated_at"]
        ];
    }

    /**
     * @inheritDoc
     */
    protected function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {
                self::USER_NOT_FOUND => throw new UserNotFoundException("User information not found", $this->notFound())
            };

        }
    }

    /**
     * @return void
     * @throws DuplicateUserException
     */
    public function checkExist():void
    {
       if (!empty($this->entity())){
            throw new DuplicateUserException('User information has already been registered', $this->badRequest());
       }
    }

}
