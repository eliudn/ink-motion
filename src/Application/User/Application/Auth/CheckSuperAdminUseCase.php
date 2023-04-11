<?php

namespace Src\Application\User\Application\Auth;

use Src\Application\User\Domain\User;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObject\LoginJwt;

class CheckSuperAdminUseCase
{

    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract,
        private readonly UserRoleUseCase $userRoleUseCase
    )
    {
    }
    public function __invoke(string $jwt)
    {
        $user =new User( $this->loginAuthenticationContract->get(new LoginJwt($jwt)));
        $userRole = $this->userRoleUseCase->__invoke($user->entity()->id);
        return $user->checkSuperAdmin(
            $userRole->entity()[0]["roles"][0]["name"]
        );
    }
}
