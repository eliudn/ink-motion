<?php

namespace Src\Management\Login\Domain\ValueObject;

use Src\Shared\Domain\ValueObjects\MixedValueObject;

class LoginAuthenticationValueObject extends MixedValueObject
{

    public function checkPassword(string $passwordRequest,string $password):bool
    {
        return password_verify($passwordRequest,$password);
    }
}
