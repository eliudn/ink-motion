<?php

namespace Src\Management\Login\Applications\Auth;

use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObject\LoginJwt;

class LoginCheckAuthenticationUseCase
{
    /**
     * @param LoginAuthenticationContract $loginAuthenticationContract
     */
    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract
    )
    {
    }

    /**
     * @param string $jwt
     * @return bool
     */
    public function __invoke(string $jwt): bool
    {
        return $this->loginAuthenticationContract->check(new LoginJwt($jwt));
    }
}
