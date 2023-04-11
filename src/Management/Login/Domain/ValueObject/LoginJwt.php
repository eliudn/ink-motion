<?php

namespace Src\Management\Login\Domain\ValueObject;

use Src\Shared\Domain\ValueObjects\StringValueObject;

class LoginJwt extends StringValueObject
{
    /**
     * @return string
     */
    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    /**
     * @return array
     */
    public function jwtEncrypt(): array
    {
        return [env('JWT_ENCRYPT')];
    }
}
