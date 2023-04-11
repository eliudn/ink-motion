<?php

namespace Src\Application\User\Application\Auth;

use Src\Application\User\Domain\Contracts\UserAuthRepositoriesContract;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;

class UserRoleUseCase
{
    public function __construct(
        private readonly UserAuthRepositoriesContract $authRepositoriesContract
    )
    {
    }

    public function __invoke(string $userId)
    {
       return $this->authRepositoriesContract->getUseRole(new UserIdValueObject($userId));
    }
}
