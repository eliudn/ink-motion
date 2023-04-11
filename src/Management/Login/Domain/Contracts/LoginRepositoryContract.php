<?php

namespace Src\Management\Login\Domain\Contracts;

use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObject\LoginAuthenticationValueObject;

interface LoginRepositoryContract
{
    /**
     * @return Login
     */
    public function login(LoginAuthenticationValueObject $loginAuthenticationValueObject):Login;
}
