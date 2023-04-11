<?php

namespace Src\Management\Login\Applications\Login;

use Src\Management\Login\Applications\Auth\LoginAuthenticationUseCase;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObject\LoginAuthenticationValueObject;

final class LoginAuthUseCase
{
    public function __construct(
        private readonly LoginRepositoryContract $loginRepositoryContract,
        private readonly LoginAuthenticationUseCase $loginAuthenticationUseCase
    )
    {
    }

    public function __invoke(array $request)
    {

       $login =$this->loginRepositoryContract->login(new LoginAuthenticationValueObject($request));
       // dd($login->handler());
       $jwt = $this->loginAuthenticationUseCase->__invoke($login->handler());

        return new Login(array_merge($login->handler(),
            [
            "jwt"=>$this->loginAuthenticationUseCase->__invoke($login->handler())
        ]));
    }
}
