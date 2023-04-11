<?php

namespace Src\Application\UserInformation\Application\Delete;

use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\UserInformation\Domain\Contracts\UserInformationRepositoryContract;
use Src\Application\UserInformation\Domain\UserInformationEntity;

class UserInformationDestroyUseCase
{

    public function __construct(
        private readonly UserInformationRepositoryContract $userInformationRepositoryContract
    )
    {
    }

    public function __invoke(string $userId):UserInformationEntity
    {
       return $this->userInformationRepositoryContract->destroy(new UserIdValueObject($userId));
    }
}
