<?php

namespace Src\Application\User\Application\Auth;

use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserIdValueObject;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObject\LoginJwt;

class UserAuthUseCase
{
    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract,

    )
    {
    }

    public function __invoke(string $jwt, string $idUser):bool
    {

       $user= new User($this->loginAuthenticationContract->get(new LoginJwt($jwt))) ;

       return $user->checkAuthorization(new UserIdValueObject($idUser));
    }
}
