<?php

namespace Src\Application\User\Application\Get;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;

class UserIndexUseCase
{
    public function __construct(
        private readonly UserRepositoryContract $userRepositoryContract
    )
    {
    }

    public function __invoke(): User
    {
        $user = $this->userRepositoryContract->index();
        return $user;
    }
}
