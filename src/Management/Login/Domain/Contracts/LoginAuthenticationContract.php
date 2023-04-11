<?php

namespace Src\Management\Login\Domain\Contracts;

use Src\Management\Login\Domain\ValueObject\LoginAuthenticationParametersValueObject;
use Src\Management\Login\Domain\ValueObject\LoginJwt;

interface LoginAuthenticationContract
{

    /**
     * @param LoginAuthenticationParametersValueObject $loginAuthenticationParametersValueObject
     * @return string
     */
    public function  auth(LoginAuthenticationParametersValueObject $loginAuthenticationParametersValueObject):string;

    /**
     * @param LoginJwt $loginJwt
     * @return bool
     */
    public function check(LoginJwt $loginJwt): bool;

    /**
     * @param LoginJwt $loginJwt
     * @return mixed
     */
    public function get(LoginJwt $loginJwt): mixed;
}
