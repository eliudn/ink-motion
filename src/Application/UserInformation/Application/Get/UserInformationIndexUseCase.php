<?php

namespace Src\Application\UserInformation\Application\Get;

use Src\Application\UserInformation\Domain\Contracts\UserInformationRepositoryContract;
use Src\Application\UserInformation\Domain\UserInformationEntity;

class UserInformationIndexUseCase
{
    public function __construct(
        private readonly UserInformationRepositoryContract $userInformationRepositoryContract
    )
    {
    }
    public function __invoke():UserInformationEntity
    {
       return $this->userInformationRepositoryContract->index();
    }
}
