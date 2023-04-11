<?php

namespace Src\Management\Login\Applications\Auth;

use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObject\LoginAuthenticationParametersValueObject;

class LoginAuthenticationUseCase
{
    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract
    )
    {
    }

    public function __invoke(array $request)
    {
       return $this->loginAuthenticationContract->auth(
           new LoginAuthenticationParametersValueObject($request)
       );
    }
}
