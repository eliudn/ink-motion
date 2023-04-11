<?php

namespace Src\Management\Login\Applications\Auth;

use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObject\LoginJwt;

class LoginRoleAuthenticationUseCase
{
    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract
    )
    {
    }

    public function __invoke(
        string $jwt,
        string|array $typeRole
    )
    {
      $login = new Login([
          "user"=>$this->loginAuthenticationContract->get(new LoginJwt($jwt)),
          "typeRoles" => $typeRole
      ]);

      return $login->getCheckRole();
    }
}
