<?php

namespace Src\Application\User\Application\Update;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Application\User\Domain\ValueObjects\UserUpdateValueObject;

class UserUpdateUseCase
{

    public function __construct(
        private readonly UserRepositoryContract $userRepositoryContract
    )
    {
    }

    /**
     * @param array $request
     * @param string $userId
     * @return User
     */
    public function __invoke(array $request, string $userId): User
    {
        return $this->userRepositoryContract->update(
            new UserUpdateValueObject($request),
            new UserIdValueObject($userId)
        );
    }
}
