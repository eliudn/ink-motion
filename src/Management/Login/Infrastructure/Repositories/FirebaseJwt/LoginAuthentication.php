<?php

namespace Src\Management\Login\Infrastructure\Repositories\FirebaseJwt;

use Exception;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObject\LoginAuthenticationParametersValueObject;
use Firebase\JWT\JWT;
use Src\Management\Login\Domain\ValueObject\LoginJwt;

final class LoginAuthentication implements LoginAuthenticationContract
{
    private  JWT $jwt;

    public function __construct()
    {
        $this->jwt = new JWT();
    }


    public function auth(LoginAuthenticationParametersValueObject $loginAuthenticationParametersValueObject): string
    {
        return $this->jwt::encode(
            [
                $loginAuthenticationParametersValueObject->handler()
            ],
            $loginAuthenticationParametersValueObject->jwtKey()
        );
    }

    public function check(LoginJwt $loginJwt): bool
    {
        try {
            $decode = $this->jwt::decode(
                $loginJwt->value(),
                $loginJwt->jwtKey(),
                $loginJwt->jwtEncrypt()
            );

            if(time() > $decode[0]->exp){
                return false;
            }
        }catch (Exception){
            return  false;
        }
        return true;
    }

    /**
     * @param LoginJwt $loginJwt
     * @return mixed
     */
    public function get(LoginJwt $loginJwt): mixed
    {
        return $this->jwt::decode(
            $loginJwt->value(),
            $loginJwt->jwtKey(),
            $loginJwt->jwtEncrypt()
        )[0]->data;
    }

}
