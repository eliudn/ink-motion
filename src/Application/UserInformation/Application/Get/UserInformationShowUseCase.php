<?php

namespace Src\Application\UserInformation\Application\Get;

use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\UserInformation\Domain\Contracts\UserInformationRepositoryContract;
use Src\Application\UserInformation\Domain\UserInformationEntity;

class UserInformationShowUseCase
{
    public function __construct(
        private readonly UserInformationRepositoryContract $userInformationRepositoryContract
    )
    {
    }

    public function __invoke(string $userId, bool $except):UserInformationEntity
    {

       return $this->userInformationRepositoryContract->show(new UserIdValueObject($userId ), $except);

    }
}
