<?php

namespace Src\Application\User\Application\Destroy;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class UserDestroyUseCase
{
    public function __construct(
        private readonly UserRepositoryContract $userRepositoryContract
    )
    {
    }
    public function __invoke(string $userId):User
    {
       return $this->userRepositoryContract->destroy(new UserIdValueObject($userId));
    }
}
