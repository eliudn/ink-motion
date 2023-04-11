<?php

namespace Src\Application\User\Application\Get;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class UserShowUseCase
{

    public function __construct(
        private readonly UserRepositoryContract  $userRepositoryContract
    )
    {
    }

    public function __invoke(string $userId)
    {
        return $this->userRepositoryContract->show(new UserIdValueObject($userId));
    }
}
